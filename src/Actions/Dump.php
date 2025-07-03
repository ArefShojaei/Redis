<?php

namespace Redis\Actions;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Dump implements ActionInterface {
    public function dispatch(): string {
        $storage = Storage::all();
        
        return $storage ? print_r($storage, true) : "(nil)";
    }
}