<?php

namespace App\Http\Controllers;

use App\Models\Rss;
use DOMAttr;
use DOMDocument;
use DOMException;
use Illuminate\Http\Request;
use \App\Models\News;
use Illuminate\Support\Facades\DB;

class SharedRss extends Controller
{
    /**
     * @return mixed
     */
    public function index(): mixed
    {
        $data = News::query()->select(['title', 'link', 'desc', 'category', 'pubDate'])->
        orderBy('pubDate', 'desc')->take(20)->get()->toArray();

        return response()->xml(['item' => $data]);
    }
}
