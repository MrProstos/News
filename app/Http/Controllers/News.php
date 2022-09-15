<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class News extends Controller
{
    /**
     * Show news
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('news', [
            'news' => DB::table('news')->orderBy('pubDate', 'desc')->paginate(10),
            'page' => 'Новости'
        ]);
    }
}
