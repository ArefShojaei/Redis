<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Storage\Storage;


final class Lpop implements IAction {
    private string $list;

    
    public function __construct(array $params) {
        $this->list = current($params);
    }

    public function dispatch(): string {
        $isRemoved = Storage::removeList($this->list, leftPop: true);
    
        return $isRemoved ? "True" : "(nil)";
    }
}