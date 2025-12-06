<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'in:admin,member'], // role wajib
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // CREATE USER
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role, // SIMPAN ROLE
            'password' => Hash::make($request->password),
        ]);

        $user->balance()->create([
            'balance' => 0,
        ]);


        event(new Registered($user));

        Auth::login($user);

        // REDIRECT BERDASARKAN ROLE
        return $user->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('member.dashboard');
    }
}
