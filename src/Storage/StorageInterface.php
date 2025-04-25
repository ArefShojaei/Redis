<?php

namespace Redis\Storage;


interface HasCRUDInterface {
    public static function save(string $key, string $value): bool;
    public static function get(string $key): ?string;
    public static function update(string $key, string $newValue): bool;
    public static function all(): ?array;
    public static function remove(string $key): bool;
}

interface StorageInterface extends HasCRUDInterface {}