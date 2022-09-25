<?php

namespace App\Http\Controllers;

use App\Models\MemcachedServer;
use App\Models\News;

class SharedRss extends Controller
{
    /**
     * Show my rss
     * @return mixed
     */
    public function index(): mixed
    {
        $mem = new MemcachedServer();
        $rss = $mem->get('rss');
        if (!$rss) {
            $newDb = new News();
            $xmlData = $newDb->getData();
            $mem->set('rss', $xmlData, null, 300);

            return response()->xml(['item' => $xmlData]);
        }

        return response()->xml(['item' => $rss]);
    }
}
