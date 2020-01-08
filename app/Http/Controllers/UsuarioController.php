<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Rol;
use App\Sede;
use App\Curso;

class UsuarioController extends Controller {

    public function index() {

        $usuarios = Usuario::orderBy('Id', 'desc')->paginate(10);
        return view('usuario.index', compact('usuarios'));

    }

    public function create() {

        $rolList = Rol::all()->where('estado', 1) -> pluck('nombre','id');
        $sedeList = Sede::all()->where('estado', 1) -> pluck('nombre','id');
        
        return view('usuario.create', compact('rolList','sedeList'));

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            
            'id'=>'Required',
            'rut'=>'Required',
            'nombre'=>'Required',
            'email'=>'Required',
            'password'=>'Required',
            'rol_id'=>'Required',
            'sede_id'=>'Required',
            'estado'=>'Required'
           
        ]);

        $usuario = $request->all();
        Usuario::create($usuario);
        return redirect('usuario');

    }

    public function edit($id) {

        $usuario = Usuario::find($id);
        $rolList = Rol::all()->where('estado', 1) -> pluck('nombre','id');
        $sedeList = Sede::all()->where('estado', 1) -> pluck('nombre','id');

        return view('usuario.edit', compact('usuario','rolList','sedeList'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'rut'=>'Required',
            'nombre'=>'Required',
            'email'=>'Required',
            'password'=>'Required',
            'rol_id'=>'Required',
            'sede_id'=>'Required',
            'estado'=>'Required'

        ]);

        $usuario = Usuario::find($id);
        $usuarioUpdate = $request->all();
        $usuario->update($usuarioUpdate);
        return redirect('usuario');    
    }

}