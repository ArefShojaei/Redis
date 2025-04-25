<?php

namespace Redis\Storage\Providers;


trait HasHashTable {
    private static function hash(string $key): string {
        return strlen($key) % 10;
    }
}