<?php

namespace App\Models;

use Memcache;

/**
 *  A class for working with the memcached server
 *
 */
class MemcachedServer extends Memcache
{
    private const HOST = 'localhost';
    private const PORT = 11211;

    public function __construct()
    {
        parent::addServer(self::HOST, self::PORT);
    }
}
