<?php

namespace Redis\Contracts\Interfaces;


interface Action {
    public function dispatch(): string;
}