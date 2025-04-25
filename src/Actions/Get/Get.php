<?php

namespace Redis\Actions\Get;

use Redis\Storage\Storage;


final class Get {
    private string $key;

    public function __construct(array $params) {
        $this->key = current($params);
    }

    public function dispatch(): string {
        $id = $this->key;

        $value = Storage::get($id);
        
        var_dump($value);

        return $this->key;
    }
}