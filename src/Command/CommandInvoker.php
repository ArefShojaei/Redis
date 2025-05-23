<?php

namespace Redis\Command;

use Redis\Command\{
    Command,
    CommandInvokerInterface
};


final class CommandInvoker implements CommandInvokerInterface {
    private ?Command $command;

    public function setCommand(Command $command): void {
        $this->command = $command;
    }
    
    public function executeCommand(): void {
        $action = ucfirst($this->command->getAction());

        $class = "Redis\\Actions\\{$action}\\{$action}";

        echo !class_exists($class) 
            ? "The command is not valid!" . PHP_EOL
            : (new $class($this->command->getParams()))->dispatch() . PHP_EOL;
    }
}