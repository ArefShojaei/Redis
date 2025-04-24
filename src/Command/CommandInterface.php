<?php

namespace Redis\Command;


interface CommandInterface {
    public function isEmpty(): bool;
    public function toArray(): ?array;
    public function toString(): ?string;
    public function getAction(): ?string;
    public function getParams(): ?array;
}