<?php

namespace Redis\Logging;

use Redis\Contracts\Interfaces\Logger as ILogger;


final class Logger implements ILogger {
    public static function log(string $command): void {
        $createdAt = date("Y-m-d H:i:s");

        $content = "[{$createdAt}] {$command}";

        self::save($content);
    }

    private static function save(string $log): void {
        file_put_contents(dirname(__DIR__, 2) . "/public/storage/command.log", $log . PHP_EOL, FILE_APPEND);
    }
}