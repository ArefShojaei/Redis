<?php

namespace Redis\Actions\Hset;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Hset implements ActionInterface {
    private string $alias;

    private string $key;

    private string $value;


    public function __construct(array $params) {
        [$alias, $key, $value] = $params;

        $this->alias = $alias;

        $this->key = $key;
        
        $this->value = $value;
    }

    public function dispatch(): string {
        $isSaved = Storage::saveWithAlias($this->alias, $this->key, $this->value);
        
        return $isSaved ? "True": "(nil)";
    }
}