<?php

namespace Redis\Actions\Hgetall;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Hgetall implements ActionInterface {
    private string $alias;


    public function __construct(array $params) {
        $this->alias = current($params);
    }

    public function dispatch(): string {
        $isSaved = Storage::getWithAlias($this->alias);
        
        print_r($isSaved);

        return $isSaved ? "True": "(nil)";
    }
}