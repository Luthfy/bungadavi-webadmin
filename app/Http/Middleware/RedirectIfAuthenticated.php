<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (auth()->user()->hasRole('bungadavi')) {
                    return redirect()->route('bungadavi.dashboard');
                } else if (auth()->user()->hasRole('corporate')) {
                    return redirect()->route('corporate.dashboard');
                } else if (auth()->user()->hasRole('affiliate')) {
                    return redirect()->route('affiliate.dashboard');
                } else if (auth()->user()->hasRole('superadmin')) {
                    return redirect()->intended(RouteServiceProvider::HOME);
                } else {
                    return redirect()->back();
                }
                // return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
