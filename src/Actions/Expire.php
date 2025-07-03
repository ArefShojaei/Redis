<?php

namespace Redis\Actions;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Expire implements ActionInterface {
    private const HASH = "time";

    private string $key;

    private string $value;


    public function __construct(array $params) {
        [$key, $value] = $params;

        $this->key = $key;
        
        $this->value = $value;
    }

    public function dispatch(): string {
        $currentTimestamp = time();

        $futureTimestamp = $currentTimestamp + $this->value;

        Storage::saveHash(self::HASH, $this->key, $futureTimestamp);

        return true ? "True": "(nil)";
    }
}