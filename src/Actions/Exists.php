<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Storage\Storage;


final class Exists implements IAction {
    private string $key;

    
    public function __construct(array $params) {
        $this->key = current($params);
    }

    public function dispatch(): string {
        $isExists = Storage::has($this->key);
        
        return $isExists ? "True" : "(nil)";
    }
}