<?php

namespace App\Http\Controllers;


use App\Models\News;

class SharedRss extends Controller
{
    /**
     * Show my rss
     * @return mixed
     */
    public function index(): mixed
    {
        $newDb = new News();
        return response()->xml(['item' => $newDb->getData()]);
    }
}
