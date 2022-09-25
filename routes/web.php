<?php

/**
 * Web Router
 *
 * @category Router
 *
 * @package Category
 *
 * @author vlad <vladmihin28@gmail.com>
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\News;
use App\Http\Controllers\Src;
use App\Http\Controllers\SharedRss;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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

Route::get('/signIn', [LoginController::class, 'index'])->name('login');
Route::post('/signIn/check', [LoginController::class, 'login']);

Route::get('/signUp', [RegisterController::class, 'index']);
Route::post('/signUp/registration', [RegisterController::class, 'register']);

Route::middleware(['user-access','auth'])->group(
    function () {
        Route::redirect('/', '/news');
        Route::get('/news/{creator?}', [News::class, 'index']);
        Route::get('/src', [Src::class, 'index']);
        Route::post('/src/add', [Src::class, 'add']);
        Route::get('/rss', [SharedRss::class, 'index']);
    }
);
