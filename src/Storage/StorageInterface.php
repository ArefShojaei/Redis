<?php

namespace Redis\Storage;


interface HasStringInterface {
    public static function save(string $key, string $value): bool;
    public static function get(string $key): ?string;
    public static function update(string $key, string $newValue): bool;
    public static function remove(string $key): bool;
    public static function has(string $key): bool;
}

interface HasHashInterface {
    public static function saveHash(string $hash, string $key, string $value): bool;
    public static function getHash(string $hash): ?array;
    public static function getHashByKey(string $hash, string $key): ?string;
    public static function updateHash(string $hash, string $key, string $newValue): bool;
    public static function removeHash(string $hash): bool;
    public static function removeHashByKey(string $hash, string $key): bool;
    public static function hasHash(string $hash): bool;
    public static function hasHashByKey(string $hash, string $key): bool;
}

interface HasCRUDInterface extends HasStringInterface, HasHashInterface {
    public static function all(): array;
    public static function destroy(): bool;
}


interface StorageInterface extends HasCRUDInterface {}