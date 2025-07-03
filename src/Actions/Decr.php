<?php

namespace Redis\Actions\Decr;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Decr implements ActionInterface {
    private string $key;

    
    public function __construct(array $params) {
        $this->key = current($params);
    }

    public function dispatch(): string {
        $value = Storage::get($this->key);

        $newValue = $value - 1;

        $isUpdated = Storage::update($this->key, $newValue);
        
        return $isUpdated ? $newValue : "(nil)";
    }
}