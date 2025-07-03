<?php

namespace Redis\Actions\Ping;

use Redis\ActionInterface;


final class Ping implements ActionInterface {
    public function dispatch(): string {
        return "PONG!";
    }
}