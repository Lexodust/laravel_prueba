<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;



class UsuarioController extends Controller
{
    
    public function registro(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|unique:usuarios,email',
            'clave' => 'required|min:6',
        ]);

        $usuario = new Usuario;
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->email = $request->email;
        $usuario->clave = Hash::make($request->clave);
        $usuario->save();

        return response()->json(['mensaje' => 'Usuario registrado con éxito']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'clave' => 'required',
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->clave, $usuario->clave)) {
            return response()->json(['mensaje' => 'Credenciales incorrectas'], 401);
        }

        $token = $usuario->createToken('token-de-prueba')->plainTextToken;

        return response()->json(['token' => $token]);
    }

    public function lista()
    {
        $usuarios = Usuario::all();

        return response()->json($usuarios);
    }
}
?>