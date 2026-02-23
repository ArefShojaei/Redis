<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Enums\ActionMessage;
use Redis\Storage\Storage;


final class Unlink implements IAction {
    private array $keys;


    public function __construct(array $params) {
        $this->keys = $params;
    }

    public function dispatch(): string {
        $result = "";

        foreach ($this->keys as $index => $key) {
            $index++;

            $result .= Storage::remove($key) ? "{$index}) " . ActionMessage::GOOD->value . PHP_EOL : "{$index}) " . ActionMessage::BAD->value . PHP_EOL;
        }

        return $result;
    }
}