<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Enums\ActionMessage;
use Redis\Storage\Storage;


final class Hlen implements IAction {
    private string $hash;

    
    public function __construct(array $params) {
        $this->hash = current($params);
    }

    public function dispatch(): string {
        $data = Storage::getHash($this->hash);
        
        return $data ? count($data) : ActionMessage::BAD->value;
    }
}