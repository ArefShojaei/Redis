<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Storage\Storage;


final class Del implements IAction {
    private string $key;

    
    public function __construct(array $params) {
        $this->key = current($params);
    }

    public function dispatch(): string {
        $isRemoved = Storage::remove($this->key);
        
        return $isRemoved ? "True" : "(nil)";
    }
}