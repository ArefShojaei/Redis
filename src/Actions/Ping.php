<?php

namespace Redis\Actions;

use Redis\ActionInterface;


final class Ping implements ActionInterface {
    public function dispatch(): string {
        return "PONG!";
    }
}