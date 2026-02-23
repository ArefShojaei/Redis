<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;


final class Quit implements IAction {
    public function dispatch(): string {
        exit;
    }
}