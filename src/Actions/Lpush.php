<?php

namespace Redis\Actions\Lpush;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class Lpush implements ActionInterface {
    private string $list;

    private string $value;

    
    public function __construct(array $params) {
        [$list, $value] = $params;    
    
        $this->list = $list;

        $this->value = $value;
    }

    public function dispatch(): string {
        $isSaved = Storage::saveList($this->list, $this->value, leftPush: true);
    
        return $isSaved ? "True" : "(nil)";
    }
}