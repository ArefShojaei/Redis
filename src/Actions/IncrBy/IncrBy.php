<?php

namespace Redis\Actions\IncrBy;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class IncrBy implements ActionInterface {
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