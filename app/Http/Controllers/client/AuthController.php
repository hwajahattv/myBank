<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Account;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function auth()
    {
        return view('frontend.auth');
    }

    public function login()
    {
        return view('frontend.login');
        // return view('mobileUI.auth.login');
    }
    public function register()
    {
        return view('frontend.register');
        // return view('mobileUI.auth.register');
    }
    public function forgotPassword()
    {
        return view('mobileUI.auth.forgot-password');
    }
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        Alert::success('Successfull!', 'You are logged in successfully.');

        return redirect('/client/dashboard');
    }
    public function dashboard()
    {
        // dd(Auth::user());
        $credit = Account::where(['user_id' => Auth::user()->id])->firstOrFail()->credit;
        return view('frontend.dashboard', ['credit' => $credit]);
    }
    public function profile()
    {
        $client = User::find(Auth::user()->id);
        $credit = Account::where(['user_id' => Auth::user()->id])->first()->credit;
        return view('frontend.profile', ['credit' => $credit]);
    }
}
