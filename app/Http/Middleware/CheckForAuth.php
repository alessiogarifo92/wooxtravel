<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class CheckForAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        //if I'm logged in and I try to access the login page, I get redirect to admin index page
        if ($request->url('admin/login')) {
            if (isset(Auth::guard('admin')->user()->name)) {
                return redirect()->route('admin.index');
            }
        }

        return $next($request);
    }
}
