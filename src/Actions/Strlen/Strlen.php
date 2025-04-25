<?php

namespace Redis\Actions\Strlen;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Strlen implements ActionInterface {
    private string $key;

    public function __construct(array $params) {
        $this->key = current($params);
    }

    public function dispatch(): string {
        $value = Storage::get($this->key);
        
        return $value ? (string) strlen($value) : "(nil)";
    }
}