<?php

namespace Redis\Actions\Lset;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Lset implements ActionInterface {
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