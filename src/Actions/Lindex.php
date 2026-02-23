<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Enums\ActionMessage;
use Redis\Storage\Storage;


final class Lindex implements IAction {
    private string $list;

    private string $index;


    public function __construct(array $params) {
        [$list, $index] = $params;

        $this->list = $list;

        $this->index = $index;
    }

    public function dispatch(): string {
        $list = Storage::getList($this->list);

        return $list ? "* " . $list[$this->index] : ActionMessage::BAD->value;
    }
}