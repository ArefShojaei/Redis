<?php

namespace Redis\Actions\DecrBy;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class DecrBy implements ActionInterface {
    private string $key;

    private string $value;

    
    public function __construct(array $params) {
        [$key, $value] = $params;

        $this->key = $key;
        
        $this->value = $value;
    }

    public function dispatch(): string {
        $newValue = $this->value;

        $isUpdated = Storage::update($this->key, $newValue);
        
        return $isUpdated ? $newValue : "(nil)";
    }
}