<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class News extends Controller
{
    /**
     * Show all news
     * @param null $creator
     * @return Application|Factory|View
     */
    public function index($creator = null): View|Factory|Application
    {
        $news = new \App\Models\News();
        $src = new Src();

        $startDate = request()->get('startDate');
        $endDate = request()->get('endDate');
        $searchWord = request()->get('searchWord');

        return view('news', [
            'news' => $news
                ->getFilterData($creator, $startDate, $endDate, $searchWord)
                ->paginate(10)
                ->appends(request()->query()),
            'srcList' => $src->scrList(),
            'page' => 'Новости'
        ]);
    }
}
