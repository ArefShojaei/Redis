<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Storage\Storage;


final class DecrBy implements IAction {
    private string $key;

    private string $value;

    
    public function __construct(array $params) {
        [$key, $value] = $params;

        $this->key = $key;
        
        $this->value = $value;
    }

    public function dispatch(): string {
        $newValue = $this->value;

        $isUpdated = Storage::update($this->key, $newValue);
        
        return $isUpdated ? $newValue : "(nil)";
    }
}