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
     * Show news
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('src', ['page' => 'src']);
    }
}
