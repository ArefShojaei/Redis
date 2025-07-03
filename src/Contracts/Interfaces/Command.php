<?php

namespace Redis\Contracts\Interfaces;


interface Command {
    public function isEmpty(): bool;
    public function toArray(): ?array;
    public function toString(): ?string;
    public function getAction(): ?string;
    public function getParams(): ?array;
}