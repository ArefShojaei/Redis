<?php

namespace Redis\Contracts\Interfaces;


interface HasString {
    public static function save(string $key, string $value): bool;
    public static function get(string $key): ?string;
    public static function update(string $key, string $newValue): bool;
    public static function remove(string $key): bool;
    public static function has(string $key): bool;
}

interface HasHash {
    public static function saveHash(string $name, string $key, string $value): bool;
    public static function getHash(string $name): ?array;
    public static function getHashByKey(string $name, string $key): ?string;
    public static function updateHash(string $name, string $key, string $newValue): bool;
    public static function removeHash(string $name): bool;
    public static function removeHashByKey(string $name, string $key): bool;
    public static function hasHash(string $name): bool;
    public static function hasHashByKey(string $name, string $key): bool;
}

interface HasList {
    public static function saveList(string $name, string $value, bool $leftPush = false): bool;
    public static function getList(string $name): ?array;
    public static function updateList(string $name, string $value, bool $leftPush = false): bool;
    public static function removeList(string $name): bool;
    public static function removeListByIndex(string $name, int $index, int $selfIndex): bool;
}

interface HasCRUD extends 
    HasString, HasHash {
    public static function all(): array;
    public static function destroy(): bool;
}


interface Storage extends HasCRUD {}