<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Enums\ActionMessage;
use Redis\Storage\Storage;


final class Mset implements IAction {
    private array $inputs;


    public function __construct(array $params) {
        $this->inputs = array_chunk($params, 2);
    }

    public function dispatch(): string {
        foreach ($this->inputs as $input) {
            [$key, $value] = $input;

            Storage::save($key, $value);
        }

        return true ? ActionMessage::GOOD->value : ActionMessage::BAD->value;
    }
}