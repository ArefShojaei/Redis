<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Storage\Storage;


final class Lrange implements IAction {
    private string $list;
    
    private string $start;

    private string $end;


    public function __construct(array $params) {
        [$list, $start, $end] = $params;
        
        $this->list = $list;

        $this->start = $start;

        $this->end = $end;
    }

    public function dispatch(): string {
        $list = Storage::getList($this->list);
    
        return $list ? print_r(array_slice($list, $this->start, $this->end + 1), true) : "(nil)";
    }
}