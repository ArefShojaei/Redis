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
    public static function saveHash(string $name, string $key, string $value): bool;
    public static function getHash(string $name): ?array;
    public static function getHashByKey(string $name, string $key): ?string;
    public static function updateHash(string $name, string $key, string $newValue): bool;
    public static function removeHash(string $name): bool;
    public static function removeHashByKey(string $name, string $key): bool;
    public static function hasHash(string $name): bool;
    public static function hasHashByKey(string $name, string $key): bool;
}

interface HasListInterface {
    public static function saveList(string $name, string $value, bool $leftPush = false): bool;
    public static function getList(string $name): ?array;
    public static function updateList(string $name, string $value, bool $leftPush = false): bool;
    public static function removeList(string $name): bool;
    public static function removeListByIndex(string $name, int $index, int $selfIndex): bool;
}

interface HasCRUDInterface extends 
    HasStringInterface, HasHashInterface {
    public static function all(): array;
    public static function destroy(): bool;
}


interface StorageInterface extends HasCRUDInterface {}