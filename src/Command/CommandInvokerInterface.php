<?php

namespace Redis\Command;

use Redis\Command\Command;


interface CommandInvokerInterface {
    public function setCommand(Command $command): void;
    public function executeCommand(): void;
}