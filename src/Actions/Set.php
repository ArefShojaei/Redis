<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Enums\ActionMessage;
use Redis\Storage\Storage;


final class Set implements IAction {
    private string $key;

    private string $value;


    public function __construct(array $params) {
        [$key, $value] = $params;

        $this->key = $key;
        
        $this->value = $value;
    }

    public function dispatch(): string {
        $isSaved = Storage::save($this->key, $this->value);
        
        return $isSaved ? ActionMessage::GOOD->value : ActionMessage::BAD->value;
    }
}