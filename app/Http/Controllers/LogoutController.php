<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
            Auth::logout();
            return redirect()->route('login')->with('logged_out', 'You are logged out!');
    }
}
