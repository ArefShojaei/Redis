<?php

namespace Redis\Actions\Ttl;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Ttl implements ActionInterface {
    private string $alias;

    private string $key;


    public function __construct(array $params) {
        $this->alias = "time";

        $this->key = current($params);
    }

    public function dispatch(): string {
        $currentTimestamp = time();

        $timestamps = Storage::getWithAlias($this->alias);

        if (empty($timestamps)) return "nil";

        $timestamp = $timestamps[$this->key];

        if ($currentTimestamp > $timestamp) {
            $isRemoved = Storage::removeWithAlias($this->alias, $this->key);

            return $isRemoved ? "True" : "nil";
        }

        return abs(($currentTimestamp - $timestamp)) . " seconds";
    }
}