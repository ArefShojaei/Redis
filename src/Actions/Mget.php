<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Enums\ActionMessage;
use Redis\Storage\Storage;


final class Mget implements IAction {
    private array $keys;


    public function __construct(array $params) {
        $this->keys = $params;
    }

    public function dispatch(): string {
        $content = "";
        
        foreach ($this->keys as $index => $key) {
            $index++;

            $value = Storage::get($key);

            if ($value) $content .= "{$index}) " . Storage::get($key) . PHP_EOL;
        }

        return $content ? $content : ActionMessage::BAD->value;
    }
}