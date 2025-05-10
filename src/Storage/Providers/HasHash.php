<?php

namespace Redis\Storage\Providers;


trait HasHash {
    public static function saveHash(string $name, string $key, string $value): bool {
        $index = self::hash($name);

        self::$data[self::HASH_ALIAS][$index][$name][$key] = $value;

        return true;
    }

    public static function getHash(string $name): ?array {
        $index = self::hash($name);

        return self::$data[self::HASH_ALIAS][$index][$name] ?? null;
    }

    public static function getHashByKey(string $name, string $key): ?string {
        $index = self::hash($name);

        return self::$data[self::HASH_ALIAS][$index][$name][$key] ?? null;
    }

    public static function updateHash(string $name, string $key, string $newValue): bool {
        self::saveHash($name, $key, $newValue);

        return true;
    }

    public static function removeHash(string $name): bool {
        $index = self::hash($name);
        
        if (!array_key_exists($name, self::$data[self::HASH_ALIAS][$index])) return false;
        
        unset(self::$data[self::HASH_ALIAS][$index][$name]);
        
        return true;
    }

    public static function removeHashByKey(string $name, string $key): bool {
        $index = self::hash($name);
        
        if (!array_key_exists($name, self::$data[self::HASH_ALIAS][$index]) || !array_key_exists($key, self::$data[self::HASH_ALIAS][$index][$name])) return false;
        
        unset(self::$data[self::HASH_ALIAS][$index][$name][$key]);
        
        return true;
    }

    public static function hasHash(string $name): bool {
        $index = self::hash($name);
        
        return array_key_exists($name, self::$data[self::HASH_ALIAS][$index]) ? true : false;
    }

    public static function hasHashByKey(string $name, string $key): bool {
        $index = self::hash($name);
        
        return array_key_exists($name, self::$data[self::HASH_ALIAS][$index]) && array_key_exists($key, self::$data[self::HASH_ALIAS][$index][$name]) ? true : false;
    }
}