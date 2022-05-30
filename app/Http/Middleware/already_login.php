<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\already_login as Middleware;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class already_login
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
      if (Auth::check()) {
          return redirect()->route('admin-dashboard');
      }
        return $next($request);
    }
}
