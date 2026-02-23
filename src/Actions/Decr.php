<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Enums\ActionMessage;
use Redis\Storage\Storage;


final class Decr implements IAction {
    private string $key;

    
    public function __construct(array $params) {
        $this->key = current($params);
    }

    public function dispatch(): string {
        $value = Storage::get($this->key);

        $newValue = $value - 1;

        $isUpdated = Storage::update($this->key, $newValue);
        
        return $isUpdated ? $newValue : ActionMessage::BAD->value;
    }
}