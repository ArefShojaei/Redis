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

interface HasListInterface {
    public static function saveList(string $list, string $value): bool;
    public static function getList(string $list): ?array;
    public static function getListByValue(string $list, string $value): ?string;
    public static function updateList(string $list, string $value): bool;
    public static function removeList(string $list): bool;
    public static function removeListByValue(string $list, string $value): bool;
    public static function hasList(string $list): bool;
    public static function hasListByValue(string $list, string $value): bool;
}

interface HasCRUDInterface extends 
    HasStringInterface, HasHashInterface,
    HasListInterface {
    public static function all(): array;
    public static function destroy(): bool;
}


interface StorageInterface extends HasCRUDInterface {}