<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class UserAccess
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
        if (auth()->user()->role_id == 1) //if role is admin
        {
            return $next($request);//it will procedd the login
        }
        // in other case it will block the request and send the error message
        Alert::error('Error!', 'You do not have access to this page.');
        return redirect()->route('client.dashboard')->with('error', 'You are not authenticated to visit Admin pages!');

    }
}
