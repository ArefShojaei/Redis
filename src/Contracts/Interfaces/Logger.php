<?php

namespace Redis\Contracts\Interfaces;


interface Logger {
    public static function log(string $command): void;
}