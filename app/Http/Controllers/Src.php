<?php

namespace App\Http\Controllers;

use App\Models\Rss;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class Src extends Controller
{
    /**
     * Show sources
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $news = new \App\Models\News();
        return view('src', [
            'rss' => $news->getCreatorInfo()->paginate(10),
            'page' => 'Источники'
        ]);
    }

    public function scrList(): array
    {
        return Rss::all(['creator'])->toArray();
    }
}
