<?php

namespace App\Http\Controllers;


use App\Models\News;

class SharedRss extends Controller
{
    /**
     * @return mixed
     */
    public function index(): mixed
    {
        $newDb = new News();
        return response()->xml(['item' => $newDb->getData()]);
    }
}
