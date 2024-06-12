<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticationRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }

    public function authentication(AuthenticationRequest $request)
    {
        $credentials    = $request->validated();
        $login          = auth()->attempt($credentials);

        if (!$login) return back()->withError('Pastikan email dan password telah diinputkan dengan benar.');

        $request->session()->regenerate();

        return to_route('dashboard.index')
            ->withSuccess('Anda berhasil login, selamat menikmati layanan online dari kami.');
    }
}
