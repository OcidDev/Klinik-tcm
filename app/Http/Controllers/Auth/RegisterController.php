<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        dd('masuk');
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required', // pastikan role di-validasi
        ]);

        if ($request->tujuan == 'Ya') {
            $role = 'Konsultasi'; 
        }else{
            $role = $request->tujuan; 
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $role,
            'is_admin' => 1,
            'password' => Hash::make($request->password),
        ]);
        
        auth()->login($user);
        if ($role == 'Konsultasi') {
            return redirect('Chat/3');
        }

        return redirect()->route('dashboard');
    }
    public function registerNew(Request $request)
    {
        // dd('masuk');
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required', // pastikan role di-validasi
        ]);

        if ($request->tujuan == 'Ya') {
            $role = 'Konsultasi'; 
        }else{
            $role = $request->tujuan; 
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $role,
            'is_admin' => 1,
            'password' => Hash::make($request->password),
        ]);
        
        auth()->login($user);
        if ($role == 'Konsultasi') {
            return redirect('Chat/3');
        }

        return redirect()->route('dashboard');
    }
}
