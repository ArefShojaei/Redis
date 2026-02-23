<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Enums\ActionMessage;
use Redis\Storage\Storage;


final class Hget implements IAction {
    private string $hash;

    private string $key;


    public function __construct(array $params) {
        [$hash, $key] = $params;

        $this->hash = $hash;

        $this->key = $key;
    }

    public function dispatch(): string {
        $value = Storage::getHashByKey($this->hash, $this->key);

        return $value ? $value : ActionMessage::BAD->value;
    }
}