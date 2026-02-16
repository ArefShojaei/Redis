<?php defined('BASEPATH') || die("Permission deined!");

/**
 * Storage helpers
 */
function getStore(): array {
    $store = file_get_contents(__DIR__ . "/storage/store.json");

    return json_decode($store, true);
}

function getCommands(): array {
    $log = file_get_contents(__DIR__ . "/storage/command.log");

    $commands = explode("\n", $log);

    array_pop($commands);

    return $commands;
}

function getLastCommand(): string {
    $commands = getCommands();
    
    return end($commands);
}

function _getStoreKeysCount(string $key): int {
    $store = getStore();
    
    $count = 0;

    if (!array_key_exists($key, $store)) return $count;
    
    $indexes = $store[$key];

    foreach ($indexes as $key => $data) {
        foreach ($data as $prop => $value) {
            $count++;
        }
    }
    
    return $count;
} 

/**
 * Store count helpers
 */
function getKeysCount(): int {
    return getIndexesCount() + getHashesCount() + getListCount();
}

function getIndexesCount(): int {
    return _getStoreKeysCount("indexes");
}

function getHashesCount(): int {
    return _getStoreKeysCount("hashes");
}

function getListCount(): int {
    return _getStoreKeysCount("list");
}

/**
 * Debug hepers
 */
function dd(mixed $input): void {
    echo "<pre>";
    print_r($input);
    // exit;
}
