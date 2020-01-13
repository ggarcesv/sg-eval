<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller {

    public function store(Request $request)  {

        $credentials = $request->only('email', 'password');

        return redirect('/perfil/misdatos');

        //return view('perfil.misdatoslistar');
        //if (Auth::attempt($credentials)) {         
       // }
    }


    public function index() {

        return view('login');

    }


    

}