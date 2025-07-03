<?php

namespace Redis\Actions;

use Redis\ActionInterface;


final class Quit implements ActionInterface {
    public function dispatch(): string {
       exit;
    }
}