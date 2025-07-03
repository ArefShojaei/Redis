<?php

namespace Redis\Actions;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Llen implements ActionInterface {
    private string $list;


    public function __construct(array $params) {
        $this->list = current($params);
    }

    public function dispatch(): string {
        $list = Storage::getList($this->list);
    
        return $list ? count($list) : "(nil)";
    }
}