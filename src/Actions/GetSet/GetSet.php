<?php

namespace Redis\Actions\GetSet;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class GetSet implements ActionInterface {
    private string $key;

    private string $value;


    public function __construct(array $params) {
        [$key, $value] = $params;

        $this->key = $key;
        
        $this->value = $value;
    }

    public function dispatch(): string {
        $isExists = Storage::has($this->key);

        if ($isExists) return Storage::get($this->key);

        Storage::save($this->key, $this->value);

        return Storage::get($this->key);
    }
}