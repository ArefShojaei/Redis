<?php

namespace Redis\Actions;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Hmset implements ActionInterface {
    private string $hash;

    private array $inputs;


    public function __construct(array $params) {
        $this->hash = current($params);
        
        array_shift($params);
        
        $this->inputs = array_chunk($params, 2);
    }

    public function dispatch(): string {
        foreach ($this->inputs as $input) {
            [$key, $value] = $input;

            Storage::saveHash($this->hash, $key, $value);
        }

        return true ? "True" : "(nil)";
    }
}