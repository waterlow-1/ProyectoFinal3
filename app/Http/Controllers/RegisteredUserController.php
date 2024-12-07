<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    User::create([
        'nombre' => $request->nombre,
        'email' => $request->email,
        'password' => $request->password, // Se encripta automáticamente en el modelo
    ]);

    return redirect()->route('login')->with('success', 'Usuario registrado correctamente');
}
}
