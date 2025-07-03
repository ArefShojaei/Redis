<?php

namespace Redis\Contracts\Interfaces;


interface Redis {
    public function connect(): self;
    public function launch(): void;
}