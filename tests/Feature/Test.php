<?php

namespace Tests\Feature;

use App\Models\News;
use Tests\TestCase;

class Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample(): void
    {
        $new = new News();
        $A = $new->test(News::query())->toArray();
        print_r($A);
    }
}
