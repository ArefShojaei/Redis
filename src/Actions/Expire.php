<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Enums\ActionMessage;
use Redis\Storage\Storage;


final class Expire implements IAction {
    private const HASH = "time";

    private string $key;

    private string $value;


    public function __construct(array $params) {
        [$key, $value] = $params;

        $this->key = $key;
        
        $this->value = $value;
    }

    public function dispatch(): string {
        $currentTimestamp = time();

        $futureTimestamp = $currentTimestamp + $this->value;

        Storage::saveHash(self::HASH, $this->key, $futureTimestamp);

        return true ? ActionMessage::GOOD->value : ActionMessage::BAD->value;
    }
}