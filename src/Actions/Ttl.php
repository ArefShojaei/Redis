<?php

namespace Redis\Actions;

use Redis\Contracts\Interfaces\Action as IAction;
use Redis\Enums\ActionMessage;
use Redis\Storage\Storage;


final class Ttl implements IAction {
    private const HASH = "time";

    private string $key;


    public function __construct(array $params) {
        $this->key = current($params);
    }

    public function dispatch(): string {
        $currentTimestamp = time();

        $timestamps = Storage::getHash(self::HASH);

        if (empty($timestamps)) return ActionMessage::BAD->value;

        $timestamp = $timestamps[$this->key];

        if ($currentTimestamp > $timestamp) {
            $isRemoved = Storage::removeHashByKey(self::HASH, $this->key);
            Storage::remove($this->key);

            return $isRemoved ? ActionMessage::GOOD->value : ActionMessage::BAD->value;
        }

        return abs(($currentTimestamp - $timestamp)) . " seconds";
    }
}