<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cliente;

class LoginController extends Controller
{
    public function listar()
    {
    }

    public function login()
    {
        return view('auth/login');
    }
    public function logar(Request $request)
    {
        
        $username = $request->input('email');
        $senha = $request->input('password');
       
        $usuario = Cliente::where('email', $username)->where('passwords', $senha)->first();

        if ($usuario != null) {
            
            session(['logado' => $usuario]);
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }


    public function deslogar()
    {
        session(['logado' => null]);
        return redirect()->route('login');
    }
}