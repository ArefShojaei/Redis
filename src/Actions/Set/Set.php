<?php

namespace Redis\Actions\Set;

use Redis\Storage\Storage;


final class Set {
    private string $key;

    private string $value;


    public function __construct(array $params) {
        [$key, $value] = $params;

        $this->key = $key;
        
        $this->value = $value;
    }

    public function dispatch(): string {
        $isSaved = Storage::save($this->key, $this->value);
        
        return $isSaved ? "True" : "(nil)";
    }
}