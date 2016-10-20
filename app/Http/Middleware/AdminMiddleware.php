<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{

    public function handle($request, Closure $next)
    {
        if (!empty(session()->has('admin'))){
            return $next($request);
        }
        return redirect('admin/log');
    }
}
