<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Enums\ActionMessage;
use Redis\Storage\Storage;


final class Lpush implements IAction {
    private string $list;

    private string $value;

    
    public function __construct(array $params) {
        [$list, $value] = $params;    
    
        $this->list = $list;

        $this->value = $value;
    }

    public function dispatch(): string {
        $isSaved = Storage::saveList($this->list, $this->value, leftPush: true);
    
        return $isSaved ? ActionMessage::GOOD->value : ActionMessage::BAD->value;
    }
}