<?php

namespace Redis\Contracts\Interfaces;

use Redis\Redis;


interface RedisFactory {
    public static function createCli(array $params = []): Redis;
}