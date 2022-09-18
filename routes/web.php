<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\News;
use \App\Http\Controllers\Src;
use \App\Http\Controllers\SharedRss;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['web'])->group(function () {
    Route::get('/news/{creator?}', [News::class, 'index']);
    Route::get('/src', [Src::class, 'index']);
    Route::get('/rss', [SharedRss::class, 'index']);
});
