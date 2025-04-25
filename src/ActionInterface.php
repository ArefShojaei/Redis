<?php

namespace Redis;


interface ActionInterface {
    public function dispatch(): string;
}