<?php

namespace Redis\Actions\Unlink;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Unlink implements ActionInterface {
    private array $keys;


    public function __construct(array $params) {
        $this->keys = $params;
    }

    public function dispatch(): string {
        $result = "";

        foreach ($this->keys as $index => $key) {
            $index++;

            $result .= Storage::remove($key) ? "{$index}) True" . PHP_EOL : "{$index}) (nil)" . PHP_EOL;
        }

        return $result;
    }
}