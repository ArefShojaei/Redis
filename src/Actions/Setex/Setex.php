<?php

namespace Redis\Actions\Setex;

use Redis\ActionInterface;
use Redis\Storage\Storage;
use Redis\Actions\Expire\Expire;


final class Setex implements ActionInterface {
    private string $key;

    private int $seconds;

    private string $value;


    public function __construct(array $params) {
        [$key, $seconds, $value] = $params;

        $this->key = $key;

        $this->seconds = $seconds;
        
        $this->value = $value;
    }

    public function dispatch(): string {
        $isSaved = Storage::save($this->key, $this->value);

        (new Expire([$this->key, $this->seconds]))->dispatch();
        
        return $isSaved ? "True" : "(nil)";
    }
}