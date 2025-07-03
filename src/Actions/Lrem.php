<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Storage\Storage;


final class Lrem implements IAction {
    private const SELF_INDEX = 1;

    private string $list;
    
    private string $index;


    public function __construct(array $params) {
        [$list, $index] = $params;
        
        $this->list = $list;

        $this->index = $index;
    }

    public function dispatch(): string {
        return Storage::removeListByIndex($this->list, $this->index, self::SELF_INDEX);
    }
}