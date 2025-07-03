<?php

namespace Redis\Storage;

use Redis\Contracts\Interfaces\Storage as IStorage;
use Redis\Storage\Providers\{
    HasHash,
    HasHashTable,
    HasList,
    HasString
};


final class Storage implements IStorage {
    use HasHashTable, HasString, HasHash, HasList;


    private static array $data = [];

    private const INDEX_ALIAS = "indexes";

    private const HASH_ALIAS = "hashes";
    
    private const LIST_ALIAS = "list";


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