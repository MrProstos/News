<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Src extends Controller
{
    /**
     * Show sources
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('src', [
            'rss' => DB::table('rss')->paginate(10),
            'page' => 'Источники'
        ]);
    }
}
