<?php

namespace App\Models;

use Illuminate\Http\Request;
use Memcached;

/**
 *  A class for working with the memcached server
 *
 */
class MemcachedServer
{
    private const HOST = 'localhost';
    private const PORT = 11211;
    private static ?Memcached $instance = null;

    public function __construct()
    {
        if (self::$instance === null) {
            self::$instance = new Memcached();
            self::$instance->addServer(self::HOST, self::PORT);
        }
        return self::$instance;
    }

    /**
     * @return Memcached|null
     */
    public function getMemcached(): ?Memcached
    {
        return self::$instance;
    }

    /**
     * @param Request $request
     * @return string
     */
    public function setKey(Request $request): string
    {
        return $request->route('creator') . '/' . implode('/', $request->toArray());
    }

    /**
     * Get value by key
     *
     * @param string $key
     * @return mixed
     */
    public function get(string $key): mixed
    {
        $value = $this->getMemcached()->get($key);
        if ($this->getMemcached()->getResultCode() === Memcached::RES_NOTFOUND) {
            return null;
        }
        return $value;
    }

    /**
     * Store an item
     *
     * @param string $key
     * @param mixed $value
     * @param int $ttl
     * @return bool
     */
    public function set(string $key, mixed $value, int $ttl): bool
    {
        return $this->getMemcached()->set($key, $value, $ttl);
    }
}
