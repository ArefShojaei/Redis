<?php

namespace Redis\Contracts\Interfaces;

use Redis\Command\Command;


interface CommandInvoker {
    public function setCommand(Command $command): void;
    public function executeCommand(): void;
}