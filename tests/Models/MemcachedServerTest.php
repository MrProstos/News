<?php

namespace Tests\Models;

use App\Models\MemcachedServer;
use PHPUnit\Framework\TestCase;

class MemcachedServerTest extends TestCase
{
    public function testConstruct()
    {
        $memcached = new MemcachedServer();
        $memcached->getMemcached()->set('test', 'test');
        $this->assertEquals('test', $memcached->getMemcached()->get('test'));
    }
}
