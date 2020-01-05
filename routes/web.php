<?php

Route::get('/', function () {
    return view('Main');
});

Route::get('/login', function () {
    return view('Login');
});


// Sede
Route::resource('/config/sede', 'SedeController');

// Route::get('/config/sede', 'SedeController@index')

/*
Route::get('/config/sede/add', function () {
    return view('SedeRegistro');
});

Route::get('/config/sede/edit/{id}', function () {
    return view('SedeEditar');
});
*/

// Escuela

Route::resource('/config/escuela', 'EscuelaController');

/*
Route::get('/config/escuela', function () {
    return view('EscuelaListar');
});

Route::get('/config/escuela/add', function () {
    return view('EscuelaRegistro');
});

Route::get('/config/escuela/edit/{id}', function () {
    return view('EscuelaEditar');
});

*/

// carrera

Route::resource('/config/carrera', 'CarreraController');

/*

Route::get('/config/carrera', function () {
    return view('CarreraListar');
});


Route::get('/config/carrera/add', function () {
    return view('CarreraRegistro');
});

Route::get('/config/carrera/edit/{id}', function () {
    return view('CarreraEditar');
});

*/


// asignatura

Route::resource('/config/asignatura', 'AsignaturaController');

/*
Route::get('/config/asignatura', function () {
    return view('AsignaturaListar');
});

Route::get('/config/asignatura/add', function () {
    return view('AsignaturaRegistro');
});

Route::get('/config/asignatura/edit/{id}', function () {
    return view('AsignaturaEditar');
});
*/

// Programa

Route::resource('/config/programa', 'ProgramaController');
Route::get('/config/programa/{id}/detalle', 'ProgramaController@detalle');



/*
Route::get('/config/programa', function () {
    return view('ProgramaListar');
});

Route::get('/config/programa/{id}', function () {
    return view('ProgramaListarDetalle');
});

Route::get('/config/programa/add', function () {
    return view('ProgramaRegistro');
});

Route::get('/config/programa/edit/{id}', function () {
    return view('ProgramaEditar');
});
*/

// Privilegio

Route::get('/config/privilegio', function () {
    return view('PrivilegioListar');
});


Route::get('/config/privilegio/add', function () {
    return view('PrivilegioRegistro');
});

Route::get('/config/privilegio/edit/{id}', function () {
    return view('PrivilegioEditar');
});


// Rol

Route::get('/config/rol', function () {
    return view('RolListar');
});


Route::get('/config/rol/add', function () {
    return view('RolRegistro');
});

Route::get('/config/rol/edit/{id}', function () {
    return view('RolEditar');
});


// Modulo

Route::get('/config/modulo', function () {
    return view('ModuloListar');
});


Route::get('/config/modulo/add', function () {
    return view('ModuloRegistro');
});

Route::get('/config/modulo/edit/{id}', function () {
    return view('ModuloEditar');
});


// Aspecto

Route::get('/config/aspecto', function () {
    return view('AspectoListar');
});


Route::get('/config/aspecto/add', function () {
    return view('AspectoRegistro');
});

Route::get('/config/aspecto/edit/{id}', function () {
    return view('AspectoEditar');
});


// Criterio

Route::get('/config/criterio', function () {
    return view('CriterioListar');
});


Route::get('/config/criterio/add', function () {
    return view('CriterioRegistro');
});

Route::get('/config/criterio/edit/{id}', function () {
    return view('CriterioEditar');
});


// Usuario

Route::get('/curso/usuario', function () {
    return view('UsuarioListar');
});

Route::get('/curso/usuario/add', function () {
    return view('UsuarioRegistro');
});

Route::get('/curso/usuario/edit/{id}', function () {
    return view('UsuarioEditar');
});


// Curso

Route::get('/curso/asignaturadocentecurso', function () {
    return view('CursoListar');
});

Route::get('/curso/asignaturadocentecurso/{id}', function () {
    return view('CursoListarDetalle');
});

Route::get('/curso/asignaturadocentecurso/add', function () {
    return view('CursoRegistro');
});

Route::get('/curso/asignaturadocentecurso/edit/{id}', function () {
    return view('CursoEditar');
});

Route::get('/curso/asignaturadocentecurso/detalle/edit/{id}', function () {
    return view('CursoEditarDetalle');
});


// Rubrica

Route::get('/curso/rubrica', function () {
    return view('RubricaListar');
});

Route::get('/curso/rubrica/{id}', function () {
    return view('RubricaListarDetalle');
});

Route::get('/curso/rubrica/add', function () {
    return view('RubricaRegistro');
});

Route::get('/curso/rubrica/edit/{id}', function () {
    return view('RubricaEditar');
});

Route::get('/curso/rubrica/detalle/edit/{id}', function () {
    return view('RubricaEditarDetalle');
});



// Autoevaluación

Route::get('/curso/autoevaluacion', function () {
    return view('AutoevaluacionListar');
});

Route::get('/curso/autoevaluacion/{id}', function () {
    return view('AutoevaluacionListarDetalle');
});


Route::get('/curso/autoevaluacion/add', function () {
    return view('AutoevaluacionRegistro');
});

Route::get('/curso/autoevaluacion/edit/{id}', function () {
    return view('AutoevaluacionEditar');
});

Route::get('/curso/autoevaluacion/detalle/edit/{id}', function () {
    return view('AutoevaluacionEditarDetalle');
});


// Calendario

Route::get('/curso/calendario', function () {
    return view('CalendarioListar');
});

Route::get('/curso/calendario/add', function () {
    return view('CalendarioRegistro');
});

Route::get('/curso/calendario/edit/{id}', function () {
    return view('CalendarioEditar');
});

 

// Rotación

Route::get('/curso/rotacion', function () {
    return view('RotacionListar');
});

Route::get('/curso/rotacion/add', function () {
    return view('RotacionRegistro');
});



// Evaluación

Route::get('/curso/evaluacion', function () {
    return view('EvaluacionListar');
});

Route::get('/curso/evaluacion/add', function () {
    return view('EvaluacionRegistro');
});



// Autoevaluación

Route::get('/perfil/autoevaluacion', function () {
    return view('Autoevaluacion');
});


// Mis Datos

Route::get('/perfil/misdatos', function () {
    return view('MisDatosListar');
});


// Ayuda

Route::get('/perfil/ayuda', function () {
    return view('AyudaListar');
});


/*

// carrera/sede

Route::get('/carrera/sede', function () {
    return view('carrera/sede_listar');
});

Route::get('/carrera/sede/registro', function () {
    return view('carrera/sede_registro');
});

Route::get('/carrera/sede/editar', function () {
    return view('carrera/sede_editar');
});

Route::get('/carrera/sede/desactivar', function () {
    return view('carrera/sede_desactivar');
});

*/