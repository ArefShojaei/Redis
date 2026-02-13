<?php

namespace Redis;

use Redis\Contracts\Interfaces\RedisFactory as IRedisFactory;


final class RedisFactory implements IRedisFactory {
    private const SERVER_HOST = "127.0.0.1";

    private const SERVER_PORT = 7000;


    private static function createInstance(array $params): Redis {
        return new Redis([
            "host" => $params["host"] ?? self::SERVER_HOST,
            "port" => $params["port"] ?? self::SERVER_PORT,
        ]);
    }

    public static function createCli(array $params = []): Redis {
        return self::createInstance($params);
    }

    public static function createServer(string $host = self::SERVER_HOST, int $port = self::SERVER_PORT): Redis {
        return self::createInstance([
            "host" => $host,
            "port" => $port
        ]);
    }
}