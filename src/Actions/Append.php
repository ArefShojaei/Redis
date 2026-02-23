<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Enums\ActionMessage;
use Redis\Storage\Storage;


final class Append implements IAction {
    private string $key;

    private string $value;


    public function __construct(array $params) {
        [$key, $value] = $params;

        $this->key = $key;
        
        $this->value = $value;
    }

    public function dispatch(): string {
        if (!Storage::has($this->key)) Storage::save($this->key, $this->value);
        
        $value = Storage::get($this->key);

        $combinedValues = $value . $this->value;

        $isSaved = Storage::save($this->key, $combinedValues);

        return $isSaved ? ActionMessage::GOOD->value : ActionMessage::BAD->value;
    }
}