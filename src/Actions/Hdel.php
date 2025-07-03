<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Storage\Storage;


final class Hdel implements IAction {
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