<?php

namespace Redis\Contracts\Interfaces;

use Redis\Redis;


interface RedisFactory {
    public static function createServer(array $params = []): Redis;
    public static function createCli(array $params = []): Redis;
}