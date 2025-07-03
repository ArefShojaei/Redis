<?php

namespace Redis\Command;

use Redis\Contracts\Interfaces\Command as ICommand;


final class Command implements ICommand {
    private ?string $command;

    public function __construct(string $command) {
        $this->command = $command;
    }

    public function isEmpty(): bool {
        return empty($this->command);
    }

    public function getAction(): ?string {
        if ($this->isEmpty()) return null;

        return current($this->toArray());
    }

    public function getParams(): ?array {
        if ($this->isEmpty()) return null;

        $args = $this->toArray();
        
        array_shift($args);

        return $args;
    }

    public function toArray(): ?array {
        if ($this->isEmpty()) return null;

        preg_match_all("/\w+|[\'\"].+[\'\"]/", $this->command, $matches);

        return current($matches);
    }
    
    public function toString(): ?string {
        if ($this->isEmpty()) return null;

        return $this->command;
    }
}