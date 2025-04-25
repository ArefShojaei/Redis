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

    private static function isEmpty(): bool {
        return empty(self::$data);
    }
}
