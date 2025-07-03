<?php

namespace Redis\Actions;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Mset implements ActionInterface {
    private array $inputs;


    public function __construct(array $params) {
        $this->inputs = array_chunk($params, 2);
    }

    public function dispatch(): string {
        foreach ($this->inputs as $input) {
            [$key, $value] = $input;

            Storage::save($key, $value);
        }

        return true ? "True" : "(nil)";
    }
}