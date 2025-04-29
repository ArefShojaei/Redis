<?php

namespace Redis\Actions\Expire;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Expire implements ActionInterface {
    private string $alias;

    private string $key;

    private int $value;


    public function __construct(array $params) {
        [$key, $value] = $params;

        $this->alias = "time";

        $this->key = $key;
        
        $this->value = $value;
    }

    public function dispatch(): string {
        $currentTimestamp = time();

        $futureTimestamp = $currentTimestamp + $this->value;

        Storage::saveWithAlias($this->alias, $this->key, $futureTimestamp);

        return true ? "True": "(nil)";
    }
}