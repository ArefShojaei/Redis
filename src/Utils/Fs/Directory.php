<?php

namespace Redis\Utils\Fs;

use Redis\Utils\Fs\DirectoryInterface as IDirectory;


final class Directory implements IDirectory {
    public static function create(string $path): bool {
        return mkdir($path, recursive:true);
    }

    public static function has(string $path): bool {
        return is_dir($path);
    }
}