<?php

namespace Redis;

use Redis\RedisFactoryInterface;


final class RedisFactory implements RedisFactoryInterface {
    private static function createInstance(array $params): Redis {
        return new Redis([
            "host" => $params["host"],
            "port" => $params["port"],
        ]);
    }

    public static function createClient(array $params): Redis {
        return self::createInstance($params);
    }

    public static function createCli(array $params): Redis {
        return self::createInstance($params);
    }
}