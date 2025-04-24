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
    
    public function executeCommand() {}
}