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
    return end(getCommands());
}

function _getStoreKeysCount(string $key): int {
    $indexes = getStore()[$key];

    $count = 0;

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
