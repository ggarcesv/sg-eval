<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Privilegio;

class PrivilegioController extends Controller {

    public function index() {

        $privilegios = Privilegio::orderBy('Id', 'asc')->paginate(10);
        return view('privilegio.index', compact('privilegios'));

    }

    public function create() {

        return view('privilegio.create');

    }

    public function store(Request $request) {
       
        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'estado'=>'Required'
        ]);

        $privilegio = $request->all();
        Privilegio::create($privilegio);
        return redirect('config/privilegio');

    }

    public function edit($id) {

        $privilegio = Privilegio::find($id);
        return view('privilegio.edit', compact('privilegio'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'id'=>'Required',
            'nombre'=>'Required',
            'estado'=>'Required'
        ]);

        $privilegio = Privilegio::find($id);
        $privilegioUpdate = $request->all();
        $privilegio->update($privilegioUpdate);
        return redirect('/config/privilegio');    
    }

}