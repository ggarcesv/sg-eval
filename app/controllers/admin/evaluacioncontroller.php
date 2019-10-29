<?php

namespace App\Controllers\Admin;


use App\Controllers\BaseController;
use App\Models\Alumno;
use App\Models\Asignatura;
use App\Models\Asignatura_seccion;
use App\Models\Docente;
use App\Models\Rubrica;
use App\Models\Rotacion_grupo;
use App\Models\Rotacion_alumno;
use App\Models\Modulo;
use App\Models\Aspecto;
use App\Models\Criterio;
use App\Models\Sede;
use Sirius\Validation\Validator;

class EvaluacionController extends BaseController {

    public function getIndex()  {

        if (isset($_SESSION['userId']))  {

            $userId=$_SESSION['userId'];
            $docente=docente::find($userId);

            if($docente)  {
                return $this->render('admin/index.twig', ['docente'=>$docente]);
            }
        }
        header('Location:' . BASE_URL . 'auth/login');
    }

    public function getAsignar_rotacion()  {

        $modulo=modulo::all();
        $alumno=alumno::all();
        $asigseg=asignatura_seccion::all();

        for ($i=0;$i<sizeof($asigseg);$i++) {

            $uno=$asigseg[$i]->asignatura_id;
            $asign=asignatura::find($uno);
            $asigseg[$i]->asignatura_id=$asign->nombre;
        }

        return $this->render('admin/asignar_rotacion.twig',[
            'modulo'=>$modulo,
            'alumno'=>$alumno,
            'asign'=>$asigseg
        ]);
    }

    public function postAsignar_rotacion() {

        $errors=[];
        $result=false;
        $validator=new Validator();
        $validator->add('inicio','required');
        $validator->add('termino','required');
        $validator->add('rotacion','required');
        $validator->add('asign','required');
        $validator->add('modulo','required');

        if ($validator->validate($_POST)) {

            $rgrupo= new rotacion_grupo();
            $rgrupo->fecha_inicio=$_POST['inicio'];
            $rgrupo->fecha_termino=$_POST['termino'];
            $rgrupo->rotacion_numero=$_POST['rotacion'];
            $rgrupo->asignatura_seccion_id=$_POST['asign'];
            $rgrupo->save();
            $alumno=$_POST['grupo'];
            $id_rgrupo= rotacion_grupo::all() -> last();

            for ($i=0;$i<sizeof($_POST['grupo']);$i++){
                $ralumno=new rotacion_alumno();
                $ralumno->alumno_id=$alumno[$i];
                $ralumno->rotacion_grupo_id =$id_rgrupo->id;
                $ralumno->modulo_id =$_POST['modulo'];
                $ralumno->save();
            }
            $result=true;

        }else{
            $errors=$validator->getMessages();
        }

        $modulo=modulo::all();
        $alumno=alumno::all();
        $asigseg=asignatura_seccion::all();
        for ($i=0;$i<sizeof($asigseg);$i++){
            $uno=$asigseg[$i]->asignatura_id;
            $asign=asignatura::find($uno);
            $asigseg[$i]->asignatura_id=$asign->nombre;
        }

        return $this->render('admin/asignar_rotacion.twig',[
            'result'=>$result,
            'errors'=>$errors,
            'modulo'=>$modulo,
            'alumno'=>$alumno,
            'asign'=>$asigseg
        ]);
    }


    public function getEvaluar() {

        $modulo=modulo::all();
        $rubrica=rubrica::all();
        
        return $this->render('admin/evaluacion.twig',[
            'modulo'=>$modulo,
            'rubrica'=>$rubrica
     ]);
    }
}