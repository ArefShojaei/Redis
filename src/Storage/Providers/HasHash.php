<?php

namespace Redis\Storage\Providers;


trait HasHash {
    public static function saveHash(string $hash, string $key, string $value): bool {
        $index = self::hash($hash);

        self::$data[self::HASH_LIST][$index][$hash][$key] = $value;

        return true;
    }

    public static function getHash(string $hash): ?array {
        $index = self::hash($hash);

        return self::$data[self::HASH_LIST][$index][$hash] ?? null;
    }

    public static function getHashByKey(string $hash, string $key): ?string {
        $index = self::hash($hash);

        return self::$data[self::HASH_LIST][$index][$hash][$key] ?? null;
    }

    public static function updateHash(string $hash, string $key, string $newValue): bool {
        self::saveHash($hash, $key, $newValue);

        return true;
    }

    public static function removeHash(string $hash): bool {
        $index = self::hash($hash);
        
        if (!array_key_exists($hash, self::$data[self::HASH_LIST][$index])) return false;
        
        unset(self::$data[self::HASH_LIST][$index][$hash]);
        
        return true;
    }

    public static function removeHashByKey(string $hash, string $key): bool {
        $index = self::hash($hash);
        
        if (!array_key_exists($hash, self::$data[self::HASH_LIST][$index]) || !array_key_exists($key, self::$data[self::HASH_LIST][$index][$hash])) return false;
        
        unset(self::$data[self::HASH_LIST][$index][$hash][$key]);
        
        return true;
    }

    public static function hasHash(string $hash): bool {
        $index = self::hash($hash);
        
        return array_key_exists($hash, self::$data[self::HASH_LIST][$index]) ? true : false;
    }

    public static function hasHashByKey(string $hash, string $key): bool {
        $index = self::hash($hash);
        
        return array_key_exists($hash, self::$data[self::HASH_LIST][$index]) || array_key_exists($key, self::$data[self::HASH_LIST][$index][$hash]) ? true : false;
    }
}