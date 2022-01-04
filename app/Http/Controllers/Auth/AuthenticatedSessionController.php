<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create($type = null)
    {
        if ($type == null) {
            return redirect()->route('login', ['type' => 'admin']);
        }

        if ($type == 'superadmin') {
            return view('auth.login');
        } elseif ($type == 'admin') {
            return view('auth.login_admin');
        } else if ($type == 'corporate') {
            return view('auth.login_corporate');
        } else if ($type == 'florist') {
            return view('auth.login_florist');
        } else {
            return redirect()->route('login', ['type' => 'admin']);
        }
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $logText = "User " . auth()->user()->name . " has been logged in " . Carbon::now()->format('y-m-d h:i:s');
        activity('login')->log($logText);

        if (auth()->user()->hasRole('superadmin')) {
            // return redirect()->intended(RouteServiceProvider::HOME);
            return redirect()->route('bungadavi.dashboard');
        } else if (auth()->user()->hasRole('bungadavi')) {
            return redirect()->route('bungadavi.dashboard');
        } else if (auth()->user()->hasRole('corporate')) {
            return redirect()->route('corporate.dashboard');
        } else if (auth()->user()->hasRole('affiliate')) {
            return redirect()->route('affiliate.dashboard');
        } else {
            return redirect()->back();
        }

    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
