<?php

namespace Redis;

use Redis\Redis;


interface RedisFactoryInterface {
    public static function createClient(array $params): Redis;
    public static function createCli(array $params): Redis;
}