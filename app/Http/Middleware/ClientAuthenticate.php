<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ClientAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::where(['email' => $request['email']])->first();
        if ($user) {
            if ($user->role_id == 2) {
                return $next($request);
            }
            Alert::error('Failed!', 'You are not authorized to log in.');
            return redirect()->route('client.login')->with('error', 'You are not authorized to log in!');
        }
        Alert::error('Failed!', 'You are not registered.');
        return redirect()->route('client.login')->with('error', 'These credentials do not match our records.');
    }
}
