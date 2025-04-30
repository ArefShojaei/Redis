<?php

namespace Redis\Actions\Flushdb;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Flushdb implements ActionInterface {
    public function dispatch(): string {
        $isDestoryed = Storage::destroy();
        
        return $isDestoryed ? "True" : "(nil)";
    }
}