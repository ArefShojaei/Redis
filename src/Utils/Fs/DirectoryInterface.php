<?php

namespace Redis\Utils\Fs;


interface DirectoryInterface {
    public static function create(string $path): bool;
    public static function has(string $path): bool;
}