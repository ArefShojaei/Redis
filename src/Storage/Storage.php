<?php

namespace Redis\Storage;

use Redis\Storage\{
    StorageInterface,
};
use Redis\Storage\Providers\{
    HasCRUD,
    HasHashTable
};


final class Storage implements StorageInterface {
    use HasCRUD, HasHashTable;
}