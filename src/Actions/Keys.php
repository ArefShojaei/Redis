<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Storage\Storage;


final class Keys implements IAction {
    public function dispatch(): string {
        $values = Storage::all();

        $result = "";

        $count = 1;

        foreach ($values as $name => $data) {
            $result .= "{$name}:\n";
            foreach ($data as $key => $_) {
                $result .= "{$count}) \"{$key}\"" . PHP_EOL;
                
                $count++;
            }

            $count = 1;

            $result .= "\n";
        }

        return $result;
    }
}