<?php

Route::get('/', function () {
    return view('welcome');
});

// Sede

Route::get('/sede', function () {
    return view('sede_listar');
});

Route::get('/sede/registro', function () {
    return view('sede_registro');
});

Route::get('/sede/editar', function () {
    return view('sede_editar');
});

Route::get('/sede/desactivar', function () {
    return view('sede_desactivar');
});

// Privilegio

Route::get('/privilegio', function () {
    return view('privilegio_listar');
});


Route::get('/privilegio/registro', function () {
    return view('privilegio_registro');
});

Route::get('/privilegio/editar', function () {
    return view('privilegio_editar');
});

Route::get('/privilegio/desactivar', function () {
    return view('privilegio_desactivar');
});

// carrera

Route::get('/carrera', function () {
    return view('carrera_listar');
});


Route::get('/carrera/registro', function () {
    return view('carrera_registro');
});

Route::get('/carrera/editar', function () {
    return view('carrera_editar');
});

Route::get('/carrera/desactivar', function () {
    return view('carrera_desactivar');
});


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



// docente

Route::get('/docente', function () {
    return view('docente_listar');
});


Route::get('/docente/registro', function () {
    return view('docente_registro');
});

Route::get('/docente/registro/masivo', function () {
    return view('docente_registro_masivo');
});

Route::get('/docente/editar', function () {
    return view('docente_editar');
});

Route::get('/docente/desactivar', function () {
    return view('docente_desactivar');
});

// alumno

Route::get('/alumno', function () {
    return view('alumno_listar');
});


Route::get('/alumno/registro', function () {
    return view('alumno_registro');
});

Route::get('/alumno/registro/masivo', function () {
    return view('alumno_registro_masivo');
});

Route::get('/alumno/editar', function () {
    return view('alumno_editar');
});

Route::get('/alumno/desactivar', function () {
    return view('alumno_desactivar');
});


// asignatura

Route::get('/asignatura', function () {
    return view('asignatura_listar');
});


Route::get('/asignatura/registro', function () {
    return view('asignatura_registro');
});

Route::get('/asignatura/editar', function () {
    return view('asignatura_editar');
});

Route::get('/asignatura/desactivar', function () {
    return view('asignatura_desactivar');
});



// seccion

Route::get('/seccion', function () {
    return view('seccion_listar');
});


Route::get('/seccion/registro', function () {
    return view('seccion_registro');
});

Route::get('/seccion/editar', function () {
    return view('seccion_editar');
});

Route::get('/seccion/desactivar', function () {
    return view('seccion_desactivar');
});


// modulo

Route::get('/modulo', function () {
    return view('modulo_listar');
});


Route::get('/modulo/registro', function () {
    return view('modulo_registro');
});

Route::get('/modulo/editar', function () {
    return view('modulo_editar');
});

Route::get('/modulo/desactivar', function () {
    return view('modulo_desactivar');
});


// rotacion

Route::get('/rotacion', function () {
    return view('rotacion_listar');
});


Route::get('/rotacion/registro', function () {
    return view('rotacion_registro');
});

Route::get('/rotacion/editar', function () {
    return view('rotacion_editar');
});

Route::get('/rotacion/desactivar', function () {
    return view('rotacion_desactivar');
});


// rotacion/alumno

Route::get('/rotacion/alumno', function () {
    return view('rotacion/alumno_listar');
});


Route::get('/rotacion/alumno/registro', function () {
    return view('rotacion/alumno_registro');
});

Route::get('/rotacion/alumno/editar', function () {
    return view('rotacion/alumno_editar');
});

Route::get('/rotacion/alumno/desactivar', function () {
    return view('rotacion/alumno_desactivar');
});


// rubrica

Route::get('/rubrica', function () {
    return view('rubrica_listar');
});


Route::get('/rubrica/registro', function () {
    return view('rubrica_registro');
});

Route::get('/rubrica/editar', function () {
    return view('rubrica_editar');
});

Route::get('/rubrica/desactivar', function () {
    return view('rubrica_desactivar');
});