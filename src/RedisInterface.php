<?php

namespace Redis;


interface RedisInterface {
    public function connect(): self;
    public function launch(): void;
}