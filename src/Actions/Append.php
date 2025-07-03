<?php

namespace Redis\Actions;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Append implements ActionInterface {
    private string $key;

    private string $value;


    public function __construct(array $params) {
        [$key, $value] = $params;

        $this->key = $key;
        
        $this->value = $value;
    }

    public function dispatch(): string {
        if (!Storage::has($this->key)) Storage::save($this->key, $this->value);
        
        $value = Storage::get($this->key);

        $combinedValues = $value . $this->value;

        $isSaved = Storage::save($this->key, $combinedValues);

        return $isSaved ? "True": "(nil)";
    }
}