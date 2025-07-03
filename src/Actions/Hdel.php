<?php

namespace Redis\Actions;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Hdel implements ActionInterface {
    private string $hash;

    private string $key;

    
    public function __construct(array $params) {
        [$hash, $key] = $params;

        $this->hash = $hash;

        $this->key = $key;
    }

    public function dispatch(): string {
        $isRemoved = Storage::removeHashByKey($this->hash, $this->key);
        
        return $isRemoved ? "True" : "(nil)";
    }
}