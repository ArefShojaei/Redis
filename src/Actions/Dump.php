<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Storage\Storage;


final class Dump implements IAction {
    public function dispatch(): string {
        $storage = Storage::all();
        
        return $storage ? print_r($storage, true) : "(nil)";
    }
}