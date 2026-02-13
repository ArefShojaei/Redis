<?php define("BASEPATH", __DIR__); require_once __DIR__ . "/helpers.php"; ?>
<?php include_once __DIR__ . "/process.php" ?>
<?php include_once __DIR__ . "/includes/header.php" ?>

  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <!-- Stats Row -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2 mb-10">
      <div class="glass rounded-xl p-6 card-hover">
        <div class="text-sm text-yellow-400 mb-1">Keys</div>
        <div class="text-3xl font-bold text-white"><?= getKeysCount() ?></div>
      </div>
      <div class="glass rounded-xl p-6 card-hover">
        <div class="text-sm text-emerald-400 mb-1">Indexes</div>
        <div class="text-3xl font-bold text-white"><?= getIndexesCount() ?></div>
      </div>
      <div class="glass rounded-xl p-6 card-hover">
        <div class="text-sm text-rose-400 mb-1">Hashes</div>
        <div class="text-3xl font-bold text-white"><?= getHashesCount() ?></div>
      </div>
      <div class="glass rounded-xl p-6 card-hover">
        <div class="text-sm text-blue-400 mb-1">List</div>
        <div class="text-3xl font-bold text-white"><?= getListCount() ?></div>
      </div>
      <div class="glass rounded-xl p-6 card-hover col-span-4">
        <div class="text-sm text-slate-400 mb-1">Last Command</div>
        <div class="text-xl font-mono text-amber-400 mt-2 break-all"><?= getLastCommand() ?></div>
      </div>
    </div>

    <!-- Keys Table -->
    <div class="glass rounded-xl overflow-hidden card-hover">
      <div class="bg-slate-800/50 px-6 py-4 border-b border-slate-700 flex items-center justify-between">
        <h2 class="text-lg font-semibold flex items-center gap-2">
          <i class="fa-solid fa-key text-redis"></i>
          Keys (Database <?= getKeysCount() ?>)
        </h2>
        <div class="flex gap-2">
          <input type="text" placeholder="Search by Key..." class="bg-slate-900 border border-slate-600 rounded px-3 py-1.5 text-sm w-48 focus:outline-none focus:border-redis">
          <button class="bg-slate-700 hover:bg-slate-600 px-3 rounded text-sm">
            <i class="fa-solid fa-search"></i>
          </button>
        </div>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full text-sm">
          <thead class="bg-slate-800/70">
            <tr>
              <th class="px-6 py-4 text-left font-medium text-slate-300">Key</th>
              <th class="px-6 py-4 text-left font-medium text-slate-300">Type</th>
              <th class="px-6 py-4 text-left font-medium text-slate-300">Value</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-800/50">
              <?php foreach($rows as $row): ?>
                <tr class="hover:bg-slate-800/40 transition-colors">
                  <td class="px-6 py-4 font-mono text-sky-300 cursor-pointer hover:underline"><?= $row["key"] ?></td>
                  <td class="px-6 py-4">
                    <?php if($row["type"] === "indexes"): ?>
                      <span class="inline-block px-2.5 py-0.5 rounded-full text-xs  bg-emerald-900/40 text-emerald-300"><?= $row["type"] ?></span>
                    <?php endif; ?>
                    <?php if($row["type"] === "hashes"): ?>
                      <span class="inline-block px-2.5 py-0.5 rounded-full text-xs  bg-rose-900/40 text-rose-300"><?= $row["type"] ?></span>
                    <?php endif; ?>
                    <?php if($row["type"] === "list"): ?>
                      <span class="inline-block px-2.5 py-0.5 rounded-full text-xs  bg-blue-900/40 text-blue-300"><?= $row["type"] ?></span>
                    <?php endif; ?>
                  </td>
                  <td class="px-6 py-4">
                    <?php if(is_array($row["value"]) && $row["type"] === "list"): ?>
                        <?= htmlspecialchars(serialize($row["value"])) ?>
                      <?php endif; ?>

                    <?php if(is_array($row["value"]) && $row["type"] === "hashes"): ?>
                      <?= htmlspecialchars(serialize($row["value"])) ?>
                    <?php endif; ?>

                    <?php if(is_string($row["value"]) && $row["type"] === "indexes"): ?>
                      <?= htmlspecialchars($row["value"]) ?>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
      </div>
    </div>

  </main>

<?php include_once __DIR__ . "/includes/footer.php" ?>