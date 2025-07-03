<?php

namespace Redis\Actions;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Exists implements ActionInterface {
    private string $key;

    
    public function __construct(array $params) {
        $this->key = current($params);
    }

    public function dispatch(): string {
        $isExists = Storage::has($this->key);
        
        return $isExists ? "True" : "(nil)";
    }
}