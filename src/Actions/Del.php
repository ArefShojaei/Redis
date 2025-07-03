<?php

namespace Redis\Actions\Del;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Del implements ActionInterface {
    private string $key;

    
    public function __construct(array $params) {
        $this->key = current($params);
    }

    public function dispatch(): string {
        $isRemoved = Storage::remove($this->key);
        
        return $isRemoved ? "True" : "(nil)";
    }
}