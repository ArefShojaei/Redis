<?php defined('BASEPATH') || die("Permission deined!");

# Get rows of keys - indexes - hashes & list
$rows = [];

foreach (getStore() as $type => $items) {
    foreach ($items as $hashKey => $meta) {
        foreach ($meta as $field => $value) {
            $rows[] = [
                "key"   => $field,
                "type"  => $type,
                "value" => $value,
                "hash" => $hashKey,
            ];
        }
    }
}