<?php

namespace Redis\Actions\Quit;

use Redis\ActionInterface;


final class Quit implements ActionInterface {
    public function dispatch(): string {
       exit;
    }
}