<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Enums\ActionMessage;
use Redis\Storage\Storage;


final class Get implements IAction {
    private string $key;

    
    public function __construct(array $params) {
        $this->key = current($params);
    }

    public function dispatch(): string {
        $value = Storage::get($this->key);
        
        return $value ? $value : ActionMessage::GOOD->value;
    }
}