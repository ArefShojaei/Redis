<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Storage\Storage;


final class Hkeys implements IAction {
    private string $hash;


    public function __construct(array $params) {
        $this->hash = current($params);
    }

    public function dispatch(): string {
        $data = Storage::getHash($this->hash);
        
        $keys = array_keys($data);

        $result = "";

        foreach ($keys as $index => $key) {
            $index++;

            $result .= "{$index}) {$key}" . PHP_EOL;
        }

        return $result ? $result : "(nil)";
    }
}