<?php

namespace Redis\Storage;

use Redis\Storage\StorageInterface;
use Redis\Storage\Providers\{
    HasHash,
    HasHashTable,
    HasString
};


final class Storage implements StorageInterface {
    use HasHashTable, HasString, HasHash;


    private static array $data = [];

    private const INDEX_LIST = "indexes";

    private const HASH_LIST = "hashes";


    public static function all(): array {
        if (self::isEmpty()) return self::$data;
        
        return self::$data;
    }
    
    public static function destroy(): bool {
        self::$data = [];

        return true;
    }

    private static function isEmpty(): bool {
        return empty(self::$data);
    }
}