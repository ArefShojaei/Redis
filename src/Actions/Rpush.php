<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Storage\Storage;


final class Rpush implements IAction {
    private string $list;

    private string $value;

    
    public function __construct(array $params) {
        [$list, $value] = $params;    
    
        $this->list = $list;

        $this->value = $value;
    }

    public function dispatch(): string {
        $isSaved = Storage::saveList($this->list, $this->value);
    
        return $isSaved ? "True" : "(nil)";
    }
}