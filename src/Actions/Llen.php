<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Enums\ActionMessage;
use Redis\Storage\Storage;


final class Llen implements IAction {
    private string $list;


    public function __construct(array $params) {
        $this->list = current($params);
    }

    public function dispatch(): string {
        $list = Storage::getList($this->list);
    
        return $list ? count($list) : ActionMessage::BAD->value;
    }
}