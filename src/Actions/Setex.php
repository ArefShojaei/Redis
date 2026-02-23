<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Storage\Storage;
use Redis\Actions\Expire;
use Redis\Enums\ActionMessage;

final class Setex implements IAction {
    private string $key;

    private string $seconds;

    private string $value;


    public function __construct(array $params) {
        [$key, $seconds, $value] = $params;

        $this->key = $key;

        $this->seconds = $seconds;
        
        $this->value = $value;
    }

    public function dispatch(): string {
        $isSaved = Storage::save($this->key, $this->value);

        (new Expire([$this->key, $this->seconds]))->dispatch();
        
        return $isSaved ? ActionMessage::GOOD->value : ActionMessage::BAD->value;
    }
}