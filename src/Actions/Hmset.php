<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Enums\ActionMessage;
use Redis\Storage\Storage;


final class Hmset implements IAction {
    private string $hash;

    private array $inputs;


    public function __construct(array $params) {
        $this->hash = current($params);
        
        array_shift($params);
        
        $this->inputs = array_chunk($params, 2);
    }

    public function dispatch(): string {
        foreach ($this->inputs as $input) {
            [$key, $value] = $input;

            Storage::saveHash($this->hash, $key, $value);
        }

        return true ? ActionMessage::GOOD->value : ActionMessage::BAD->value;
    }
}