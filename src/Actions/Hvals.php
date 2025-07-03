<?php

namespace Redis\Actions;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Hvals implements ActionInterface {
    private string $hash;


    public function __construct(array $params) {
        $this->hash = current($params);
    }

    public function dispatch(): string {
        $data = Storage::getHash($this->hash);
        
        $values = array_values($data);

        $result = "";

        foreach ($values as $index => $value) {
            $index++;

            $result .= "{$index}) {$value}" . PHP_EOL;
        }

        return $result ? $result : "(nil)";
    }
}