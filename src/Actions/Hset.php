<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Storage\Storage;


final class Hset implements IAction {
    private string $hash;

    private string $key;

    private string $value;


    public function __construct(array $params) {
        [$hash, $key, $value] = $params;

        $this->hash = $hash;

        $this->key = $key;
        
        $this->value = $value;
    }

    public function dispatch(): string {
        $isSaved = Storage::saveHash($this->hash, $this->key, $this->value);
        
        return $isSaved ? "True": "(nil)";
    }
}