<?php

namespace Redis;

use Redis\Contracts\Interfaces\RedisFactory as IRedisFactory;


final class RedisFactory implements IRedisFactory {
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