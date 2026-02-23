<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Enums\ActionMessage;
use Redis\Storage\Storage;


final class IncrBy implements IAction {
    private string $key;

    private string $value;


    public function __construct(array $params) {
        [$key, $value] = $params;

        $this->key = $key;
        
        $this->value = $value;
    }

    public function dispatch(): string {
        $currentValue = Storage::get($this->key);
        
        $newValue = $currentValue + $this->value;

        $isUpdated = Storage::update($this->key, $newValue);
        
        return $isUpdated ? $newValue : ActionMessage::BAD->value;
    }
}