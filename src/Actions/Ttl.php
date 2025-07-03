<?php

namespace Redis\Actions;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Ttl implements ActionInterface {
    private const HASH = "time";

    private string $key;


    public function __construct(array $params) {
        $this->key = current($params);
    }

    public function dispatch(): string {
        $currentTimestamp = time();

        $timestamps = Storage::getHash(self::HASH);

        if (empty($timestamps)) return "nil";

        $timestamp = $timestamps[$this->key];

        if ($currentTimestamp > $timestamp) {
            $isRemoved = Storage::removeHashByKey(self::HASH, $this->key);

            return $isRemoved ? "True" : "nil";
        }

        return abs(($currentTimestamp - $timestamp)) . " seconds";
    }
}