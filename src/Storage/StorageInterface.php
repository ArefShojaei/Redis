<?php

namespace Redis\Storage;


interface HasCRUDInterface {
    public static function save(string $key, string $value): bool;
    public static function get(string $key): ?string;
    public static function update(string $key, string $newValue): bool;
    public static function all(): ?array;
    public static function remove(string $key): bool;
    public static function has(string $key): bool;
    public static function saveWithAlias(string $alias, string $key, string $value): bool;
    public static function getWithAlias(string $alias): ?array;
    public static function updateWithAlias(string $alias, string $key, string $newValue): bool;
    public static function removeWithAlias(string $alias, string $key): bool;
    public static function destroy(): bool;
}

interface StorageInterface extends HasCRUDInterface {}