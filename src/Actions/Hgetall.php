<?php

namespace Redis\Actions;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Hgetall implements ActionInterface {
    private string $hash;


    public function __construct(array $params) {
        $this->hash = current($params);
    }

    public function dispatch(): string {
        $data = Storage::getHash($this->hash);
        
        return $data ? print_r($data, true) : "(nil)";
    }
}