<?php

namespace Redis\Actions\Hget;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Hget implements ActionInterface {
    private string $hash;

    private string $key;


    public function __construct(array $params) {
        [$hash, $key] = $params;

        $this->hash = $hash;

        $this->key = $key;
    }

    public function dispatch(): string {
        $value = Storage::getHashByKey($this->hash, $this->key);

        return $value ? $value : "(nil)";
    }
}