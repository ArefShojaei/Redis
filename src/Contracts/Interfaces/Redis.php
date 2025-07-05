<?php

namespace Redis\Contracts\Interfaces;


interface Redis {
    public function listen(): void;
    public function launch(): void;
}