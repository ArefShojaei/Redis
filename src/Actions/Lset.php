<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Storage\Storage;


final class Lset implements IAction {
    private string $list;
    
    private string $index;

    private string $newValue;


    public function __construct(array $params) {
        [$list, $index, $value] = $params;
        
        $this->list = $list;

        $this->index = $index;

        $this->newValue = $value;
    }

    public function dispatch(): string {
        $list = Storage::getList($this->list);

        $list[$this->index] = $this->newValue;
    
        return Storage::updateList($this->list, $list);
    }
}