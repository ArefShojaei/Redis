<?php

namespace Redis\Actions\Ping;


final class Ping {
    public function dispatch(): string {
        return "PONG!";
    }
}