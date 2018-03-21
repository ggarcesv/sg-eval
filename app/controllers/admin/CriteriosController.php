<?php

namespace App\Controllers\Admin;


use App\Controllers\BaseController;
use App\Models\Docente;
use App\Models\Aspecto;
use App\Models\Criterio;
use App\Models\Rubrica;
use App\Models\Rubrica_autoevaluacion;
use App\Models\Rubrica_autoevaluacion_detalle;
use App\Models\Rubrica_detalle;
use App\Models\Modulo;
use App\Models\Sede;
use Sirius\Validation\Validator;

class CriteriosController extends BaseController
{
    public function getIndex()
    {
        if (isset($_SESSION['userId']))
        {
            $userId=$_SESSION['userId'];
            $docente=Docente::find($userId);

            if($docente)
            {
                return $this->render('Admin/index.twig', ['docente'=>$docente]);
            }
        }

        header('Location:' . BASE_URL . 'auth/login');

    }

    public function getRegistro_manual()
    {
        $aspecto=Aspecto::all();
        return $this->render('Admin/registro_manual_criterios.twig',[
            'aspecto'=>$aspecto
        ]);
    }

    public function postRegistro_manual()
    {

        $errors=[];
        $result=false;
        $validator=new Validator();
        $validator->add('aspecto','required');
        $validator->add('criterio','required');


        if ($validator->validate($_POST))
        {
            $criterio=new Criterio();
            $criterio->nombre=$_POST['criterio'];
            $criterio->aspecto_id=$_POST['aspecto'];
            $criterio->save();
            $result=true;
        }else{
            $errors=$validator->getMessages();
        }

        $aspecto=Aspecto::all();

        return $this->render('Admin/registro_manual_criterios.twig',[
            'result'=>$result,
            'errors'=>$errors,
            'aspecto'=>$aspecto
        ]);
    }


    public function getRubrica()
    {
        $modulos=Modulo::all();
        $operacional=Criterio::all()->where('aspecto_id','=',1);
        $actitudinal=Criterio::all()->where('aspecto_id','=',2);

        return $this->render('Admin/registro-rubrica.twig',[
            'modulo'=>$modulos,
            'operacional'=>$operacional,
            'actitudinal'=>$actitudinal
        ]);

    }


    public function postRubrica()
    {
        $errors=[];
        $result=false;
        $validator=new Validator();
        $validator->add('modulo','required');
        $validator->add('estado','required');
        $validator->add('nombre','required');

        if ($validator->validate($_POST))
        {
            $rubrica= new Rubrica();
            $rubrica->nombre=$_POST['nombre'];
            $rubrica->modulo_id=$_POST['modulo'];
            $rubrica->save();
            $listadoO=$_POST['criterioO'];
            $listadoA=$_POST['criterioA'];
            $id_rubrica= Rubrica::all() -> last();
            for ($i=0;$i<sizeof($_POST['criterioO']);$i++){
                $rubrucad=new Rubrica_detalle();
                $rubrucad->criterio_id=$listadoO[$i];
                $rubrucad->rubrica_id =$id_rubrica->id;
                $rubrucad->estado_id =$_POST['modulo'];
                $rubrucad->save();
            }
            for ($i=0;$i<sizeof($_POST['criterioA']);$i++){
                $rubrucad=new Rubrica_detalle();
                $rubrucad->criterio_id=$listadoA[$i];
                $rubrucad->rubrica_id =$id_rubrica->id;
                $rubrucad->estado_id =$_POST['estado'];
                $rubrucad->save();
            }
            $result=true;

        }else{
            $errors=$validator->getMessages();
        }

        $modulos=Modulo::all();
        $operacional=Criterio::all()->where('aspecto_id','=',1);
        $actitudinal=Criterio::all()->where('aspecto_id','=',2);

        return $this->render('Admin/registro-rubrica.twig',[
            'result'=>$result,
            'errors'=>$errors,
            'modulo'=>$modulos,
            'operacional'=>$operacional,
            'actitudinal'=>$actitudinal
        ]);

    }

    public function getAutoevaluacion()
    {
        $autoevaluacion=Criterio::all()->where('aspecto_id','=',3);

        return $this->render('Admin/registro_autoevaluacion.twig',[
            'autoevaluacion'=>$autoevaluacion,
        ]);
    }

    public function postAutoevaluacion()
    {
        $errors=[];
        $result=false;
        $validator=new Validator();
        $validator->add('estado','required');
        $validator->add('nombre','required');

        if ($validator->validate($_POST))
        {
            $rubrica= new Rubrica_autoevaluacion();
            $rubrica->nombre=$_POST['nombre'];
            $rubrica->save();
            $listadoA=$_POST['criterioA'];
            $id_rubrica= Rubrica_autoevaluacion::all() -> last();
            for ($i=0;$i<sizeof($_POST['criterioA']);$i++){
                $rubrucad=new Rubrica_autoevaluacion_detalle();
                $rubrucad->criterio_id=$listadoA[$i];
                $rubrucad->rubrica_autoevaluacion_id =$id_rubrica->id;
                $rubrucad->estado_id =$_POST['estado'];
                $rubrucad->save();
            }
            $result=true;

        }else{
            $errors=$validator->getMessages();
        }

        $autoevaluacion=Criterio::all()->where('aspecto_id','=',1);

        return $this->render('Admin/registro_autoevaluacion.twig',[
            'result'=>$result,
            'errors'=>$errors,
            'autoevaluacion'=>$autoevaluacion
        ]);

    }


}