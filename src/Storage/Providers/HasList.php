<?php

namespace Redis\Storage\Providers;


trait HasList {    
    public static function saveList(string $name, string|array $value, bool $leftPush = false): bool {
        return $leftPush ? self::listLeftPush($name, $value) : self::listRightPush($name, $value);
    }

    private static function listLeftPush(string $name, string|array $value): bool {
        $index = self::hash($name);

        if (is_array($value)) {
            self::$data[self::LIST_ALIAS][$index][$name] = $value;

            return true;
        }

        $data = [$value, ...self::getList($name) ?? []];
        
        self::$data[self::LIST_ALIAS][$index][$name] = $data;
        
        return true;
    }
    
    private static function listRightPush(string $name, string|array $value): bool {
        $index = self::hash($name);

        if (is_array($value)) {
            self::$data[self::LIST_ALIAS][$index][$name] = $value;

            return true;
        }

        self::$data[self::LIST_ALIAS][$index][$name][] = $value;

        return true;
    }

    public static function getList(string $name): ?array {
        $index = self::hash($name);
        
        return self::$data[self::LIST_ALIAS][$index][$name] ?? null;
    }
    
    public static function updateList(string $name, string|array $value): bool {
        return self::saveList($name, $value);
    }

    public static function removeList(string $name, bool $leftPop = false): bool {
        return $leftPop ? self::listLeftPop($name) : self::listRightPop($name);
    }

    public static function removeListByIndex(string $name, int $index, int $selfIndex): bool {
        $list = self::getList($name);

        array_splice($list, $index, $selfIndex);

        return self::updateList($name, $list);
    }

    private static function listRightPop(string $name): bool {
        $data = self::getList($name);

        array_pop($data);

        return self::saveList($name, $data);
    }
    
    private static function listLeftPop(string $name): bool {
        $data = self::getList($name);

        array_shift($data);

        return self::saveList($name, $data, leftPush: true);
    }
}