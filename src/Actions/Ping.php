<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;


final class Ping implements IAction {
    public function dispatch(): string {
        return "PONG!";
    }
}