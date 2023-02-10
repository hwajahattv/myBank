<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Socialite;
use Hash;
use Laravel\Socialite\Facades\Socialite as FacadesSocialite;
use Str;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function login()
    {
        return view('auth.adminLogin');
    }
    // //Google Login

    // public function loginGoogle()
    // {
    //     return Socialite::driver('google')->redirect();
    // }
    // //Google callback  
    // public function handleGoogleCallback()
    // {

    //     $user = Socialite::driver('google')->stateless()->user();

    //     $this->_registerorLoginUser($user);
    //     return redirect()->route('home');
    // }

    // //Facebook Login
    // public function loginFacebook()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }

    // //facebook callback  
    // public function handleFacebookCallback()
    // {

    //     $user = Socialite::driver('facebook')->stateless()->user();

    //     $this->_registerorLoginUser($user);
    //     return redirect()->route('home');
    // }

    // //Github Login
    // public function loginGithub()
    // {
    //     return Socialite::driver('github')->redirect();
    // }
    // //github callback  
    // public function handleGithubCallback()
    // {

    //     $user = Socialite::driver('github')->stateless()->user();

    //     $this->_registerorLoginUser($user);
    //     return redirect()->route('home');
    // }
}
