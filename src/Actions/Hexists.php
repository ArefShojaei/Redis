<?php

namespace Redis\Actions\Hexists;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Hexists implements ActionInterface {
    private string $hash;

    private string $key;

    
    public function __construct(array $params) {
        [$hash, $key] = $params;
    
        $this->hash = $hash;

        $this->key = $key;
    }

    public function dispatch(): string {
        $isHashExists = Storage::hasHashByKey($this->hash, $this->key);
        
        return $isHashExists ? "True" : "(nil)";
    }
}