<?php

namespace Redis\Command;

use Redis\Command\Command;
use Redis\Contracts\Interfaces\CommandInvoker as ICommandInvoker;
use Redis\Exceptions\InvalidCommand;


final class CommandInvoker implements ICommandInvoker {
    private ?Command $command;

    public function setCommand(Command $command): void {
        $this->command = $command;
    }
    
    public function executeCommand(): void {
        $action = ucfirst($this->command->getAction());

        $class = "Redis\\Actions\\{$action}";

        echo !class_exists($class) 
            ? throw new InvalidCommand()
            : (new $class($this->command->getParams()))->dispatch() . PHP_EOL;
    }
}