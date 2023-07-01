<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    //Funcion para direccionar al login
    public function login_index()
    {
        return view('auth.login');
    }

    //Funcion para loguear un usuario
    public function login_store(Request $request)
    {
        // valida los datos del formulario de login
        // dd($request->all());

        // Valida los datos del formulario de login
        $request->validate([
            'email' => 'required|email|max:60',
            'password' => 'required|min:1',
        ]);

        //autenticar al usuario
        if (!auth()->attempt($request->only(['email', 'password']), $request->remember)) {
            //la directiva withErrors permite enviar un mensaje de error a la vista
            return back()->with('mensaje', 'Usuario o contraseña incorrectos');
            // return back()->withErrors(['email' => 'Usuario o contraseña incorrectos']);
        }

        // Redirecciona a la vista dashboard y se le pasa el usuario        
        return redirect()->route('home', auth()->user()->name);
    }

    //Funcion para direccionar al registro
    public function register_index()
    {
        return view('auth.register');
    }

    //Funcion para registrar un usuario
    public function register_store(Request $request)
    {
        // valida los datos del formulario de registro
        // dd($request->all());

        //Modificar el request para que no se repita el email
        $request->merge([
            'email' => Str::lower($request->email),
        ]);

        // Valida los datos del formulario de registro
        $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:60',
            'email' => 'required|email|unique:users|max:60',
            'password' => 'required|min:1',
        ]);

        // Crea un usuario
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            // Encripta la contraseña
            'password' => bcrypt($request->password),
        ]);

        // Inicia sesión
        auth()->attempt($request->only('email', 'password'));

        // Redirecciona a la vista dashboard
        return redirect()->route('home');
    }

    //Funcion para cerrar sesion
    public function logout()
    {
        // Cierra la sesión
        auth()->logout();

        // Redirecciona a la vista login
        return redirect()->route('login');
    }
}
