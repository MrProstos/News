<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Show register page
     *
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('signUp');
    }

    /**
     * @param RegisterRequest $register
     * @return RedirectResponse
     */
    public function register(RegisterRequest $register): RedirectResponse
    {

        $user = new User();
        $user->username = $register->post('username');
        $user->email = $register->post('email');
        $user->password = Hash::make($register->post('password'));
        $user->save();

        return redirect()->route('login');
    }
}
