<?php

namespace Redis\Actions\Lpop;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Lpop implements ActionInterface {
    private string $list;

    
    public function __construct(array $params) {
        $this->list = current($params);
    }

    public function dispatch(): string {
        $isRemoved = Storage::removeList($this->list, leftPop: true);
    
        return $isRemoved ? "True" : "(nil)";
    }
}