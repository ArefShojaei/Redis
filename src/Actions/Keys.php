<?php

namespace Redis\Actions;

use InvalidArgumentException;
use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Keys implements ActionInterface {
    private const SYMBOL = "*";

    private string $key;

    
    public function __construct(array $params) {
        $this->key = current($params);

        if ($this->key !== self::SYMBOL) throw new InvalidArgumentException("Should use the \"*\" in the command argument!");
    }

    public function dispatch(): string {
        $values = Storage::all();

        if (is_null($values)) return "(empty list or set)";

        $result = "";

        $count = 1;

        foreach ($values as $index => $data) {
            foreach ($data as $key => $value) {
                $result .= "{$count}) \"{$key}\"" . PHP_EOL;
                
                $count++;
            }
        }

        return $result;
    }
}