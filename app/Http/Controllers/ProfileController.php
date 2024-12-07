<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }
   
/*
    public function update(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed', // Contraseña es opcional
        ]);

        // Obtener el usuario autenticado
        $user = Auth::user();

        if (!$user) {
            // Si no hay usuario autenticado, redirigir a la página de login
            return redirect()->route('login');
        }

        // Actualizar el nombre y el email
        $user->nombre = $request->input('nombre');
        $user->email = $request->input('email');

        // Si se proporciona una nueva contraseña, actualizarla
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Guardar los cambios
        $user->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('profile.edit')->with('success', 'Perfil actualizado correctamente.');
    }
*/
}
