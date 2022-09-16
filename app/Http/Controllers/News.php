<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class News extends Controller
{
    /**
     * Show news
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $src = new \App\Http\Controllers\Src();
        return view('news', [
            'news' => \App\Models\News::query()->orderBy('pubDate', 'desc')->paginate(10),
            'srcList' => $src->scrList(),
            'page' => 'Новости'
        ]);
    }
}
