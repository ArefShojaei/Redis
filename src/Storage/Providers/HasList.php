<?php

namespace Redis\Storage\Providers;


trait HasList {
    public static function saveList(string $list, string $value): bool {
        exit;
    }
    public static function getList(string $list): ?array {
        exit;
    }
    public static function getListByValue(string $list, string $value): ?string {
        exit;
    }
    public static function updateList(string $list, string $value): bool {
        exit;
    }
    public static function removeList(string $list): bool {
        exit;
    }
    public static function removeListByValue(string $list, string $value): bool {
        exit;
    }
    public static function hasList(string $list): bool {
        exit;
    }
    public static function hasListByValue(string $list, string $value): bool {
        exit;
    }
}