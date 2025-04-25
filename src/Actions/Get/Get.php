<?php

namespace Redis\Actions\Get;

use Redis\Storage\Storage;


final class Get {
    private string $key;

    public function __construct(array $params) {
        $this->key = current($params);
    }

    public function dispatch(): string {
        $value = Storage::get($this->key);
        
        return $value ? $value : "(nil)";
    }
}