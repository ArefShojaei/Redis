<?php

namespace Redis\Actions;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Hmget implements ActionInterface {
    private string $hash;

    private array $keys;


    public function __construct(array $params) {
        $this->hash = current($params);
        
        array_shift($params);
        
        $this->keys = array_chunk($params, 2);
    }

    public function dispatch(): string {
        $content = "";
        
        foreach (current($this->keys) as $index => $key) {
            $index++;

            $value = Storage::getHashByKey($this->hash, $key);

            if ($value) $content .= "{$index}) " . $value . PHP_EOL;
        }

        return $content ? $content : "(nil)";
    }
}