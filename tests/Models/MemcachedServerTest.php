<?php

namespace Tests\Models;

use App\Models\MemcachedServer;
use App\Models\News;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class MemcachedServerTest extends TestCase
{
    public function testConstruct()
    {
        $memcached = new MemcachedServer();
        $memcached->set('test', 'test');
        $this->assertEquals('test', $memcached->get('test'));
        $memcached->delete('test');
    }
}
