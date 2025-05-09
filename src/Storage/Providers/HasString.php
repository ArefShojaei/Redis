<?php

namespace Redis\Storage\Providers;


trait HasString {
    public static function save(string $key, string $value): bool {
        $index = self::hash($key);

        self::$data[self::INDEX_ALIAS][$index][$key] = $value;

        return true;
    }

    public static function get(string $key): ?string {
        $index = self::hash($key);

        return array_key_exists($index, self::$data[self::INDEX_ALIAS]) && array_key_exists($key, self::$data[self::INDEX_ALIAS][$index])
            ? self::$data[self::INDEX_ALIAS][$index][$key]
            : null;
    }

    public static function update(string $key, string $newValue): bool {
        return self::save($key, $newValue);
    }

    public static function remove(string $key): bool {
        $index = self::hash($key);

        if (!array_key_exists($index, self::$data[self::INDEX_ALIAS]) || !array_key_exists($key, self::$data[self::INDEX_ALIAS][$index])) return false;

        unset(self::$data[self::INDEX_ALIAS][$index][$key]);

        return true;
    }

    public static function has(string $key): bool {
        $index = self::hash($key);

        return array_key_exists(self::INDEX_ALIAS, self::$data) && array_key_exists($index, self::$data[self::INDEX_ALIAS]) && array_key_exists($key, self::$data[self::INDEX_ALIAS][$index])
            ? true
            : false;
    }
}