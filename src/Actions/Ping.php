<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;


final class Ping implements IAction {
    private const MESSAGE = "PONG!";


    public function dispatch(): string {
        return self::MESSAGE;
    }
}