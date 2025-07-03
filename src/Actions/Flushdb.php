<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Storage\Storage;


final class Flushdb implements IAction {
    public function dispatch(): string {
        $isDestoryed = Storage::destroy();
        
        return $isDestoryed ? "True" : "(nil)";
    }
}