<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckCustomerSession
{
    public function handle(Request $request, Closure $next)
    {
        // If the custom customer_id session exists, let them pass
        if (Session::has('customer_id')) {
            return $next($request);
        }

        // If not, send them to login
        return redirect()->route('login')->with('error', 'Please login to continue.');
    }
}