<?php

namespace Redis\Actions;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Hlen implements ActionInterface {
    private string $hash;

    
    public function __construct(array $params) {
        $this->hash = current($params);
    }

    public function dispatch(): string {
        $data = Storage::getHash($this->hash);
        
        return $data ? count($data) : "(nil)";
    }
}