<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Enums\ActionMessage;
use Redis\Storage\Storage;


final class Flushdb implements IAction {
    public function dispatch(): string {
        $isDestoryed = Storage::destroy();
        
        return $isDestoryed ? ActionMessage::GOOD->value : ActionMessage::BAD->value;
    }
}