<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('profile.show1');
    }

    // Registro
    public function Registro(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //return response()->json([
        //    'message' => 'Usuario registrado con éxito.',
        //    'user' => $user,
        //], 201);
    }

    // Inicio de sesión
    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Las credenciales son incorrectas.'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        //return response()->json([
        //    'message' => 'Inicio de sesión exitoso.',
        //    'access_token' => $token,
        //    'token_type' => 'Bearer',
        //]);
    }

    // Cierre de sesión
    public function Logout(Request $request)
    {
        $request->user()->tokens()->delete();

        //return response()->json([
        //    'message' => 'Cierre de sesión exitoso.',
        //]);
    }
}
