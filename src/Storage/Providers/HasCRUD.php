<?php

namespace Redis\Storage\Providers;


trait HasCRUD {
    private static array $data = [];


    public static function save(string $key, string $value): bool {
        $index = self::hash($key);

        self::$data[$index][$key] = $value;

        return true;
    }

    public static function get(string $key): ?string {
        $index = self::hash($key);

        return array_key_exists($index, self::$data) && array_key_exists($key, self::$data[$index])
            ? self::$data[$index][$key]
            : null;
    }

    public static function update(string $key, string $newValue): bool {
        return self::save($key, $newValue);
    }

    public static function all(): ?array {
        if (self::isEmpty()) return null;
        
        return self::$data;
    }

    public static function remove(string $key): bool {
        $index = self::hash($key);

        if (!array_key_exists($index, self::$data) || !array_key_exists($key, self::$data[$index])) return false;

        unset(self::$data[$index][$key]);

        return true;
    }

    public static function has(string $key): bool {
        $index = self::hash($key);
        
        return array_key_exists($index, self::$data) && array_key_exists($key, self::$data[$index])
            ? true
            : false;
    }

    public static function saveWithAlias(string $alias, string $key, string $value): bool {
        self::$data[$alias][$key] = $value;

        return true;
    }

    public static function getWithAlias(string $alias): ?array {
        return self::$data[$alias] ?? null;
    }

    public static function updateWithAlias(string $alias, string $key, string $newValue): bool {
        self::saveWithAlias($alias, $key, $newValue);

        return true;
    }

    public static function removeWithAlias(string $alias, string $key): bool {
        $index = self::hash($key);

        if (!array_key_exists($alias, self::$data) || !array_key_exists($key, self::$data[$alias])) return false;
        
        unset(self::$data[$alias][$key]);
        
        unset(self::$data[$index][$key]);

        return true;
    }

    private static function isEmpty(): bool {
        return empty(self::$data);
    }
}
