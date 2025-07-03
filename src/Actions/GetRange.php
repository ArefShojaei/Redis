<?php

namespace Redis\Actions;

use Redis\ActionInterface;
use Redis\Storage\Storage;


final class GetRange implements ActionInterface {
    private string $key;

    private string $start;
    
    private string $end;

    
    public function __construct(array $params) {
        [$key, $start, $end] = $params;

        $this->key = $key;
        
        $this->start = $start;

        $this->end = $end;
    }

    public function dispatch(): string {
        $value = Storage::get($this->key);

        return $value ? substr($value, $this->start, $this->end + 1) : "(nil)";
    }
}