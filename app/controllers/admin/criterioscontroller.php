<?php

namespace app\controllers\admin;


use app\controllers\basecontroller;
use app\models\docente;
use app\models\aspecto;
use app\models\criterio;
use app\models\rubrica;
use app\models\rubrica_autoevaluacion;
use app\models\rubrica_autoevaluacion_detalle;
use app\models\rubrica_detalle;
use app\models\modulo;
use app\models\sede;
use Sirius\Validation\Validator;

class criterioscontroller extends basecontroller
{
    public function getIndex()
    {
        if (isset($_SESSION['userId']))
        {
            $userId=$_SESSION['userId'];
            $docente=docente::find($userId);

            if($docente)
            {
                return $this->render('admin/index.twig', ['docente'=>$docente]);
            }
        }

        header('Location:' . BASE_URL . 'auth/login');

    }

    public function getRegistro_manual()
    {
        $aspecto=aspecto::all();
        return $this->render('admin/registro_manual_criterios.twig',[
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
            $criterio=new criterio();
            $criterio->nombre=$_POST['criterio'];
            $criterio->aspecto_id=$_POST['aspecto'];
            $criterio->save();
            $result=true;
        }else{
            $errors=$validator->getMessages();
        }

        $aspecto=aspecto::all();

        return $this->render('admin/registro_manual_criterios.twig',[
            'result'=>$result,
            'errors'=>$errors,
            'aspecto'=>$aspecto
        ]);
    }


    public function getRubrica()
    {
        $modulos=modulo::all();
        $operacional=criterio::all()->where('aspecto_id','=',1);
        $actitudinal=criterio::all()->where('aspecto_id','=',2);

        return $this->render('admin/registro_rubrica.twig',[
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
            $rubrica= new rubrica();
            $rubrica->nombre=$_POST['nombre'];
            $rubrica->modulo_id=$_POST['modulo'];
            $rubrica->save();
            $listadoO=$_POST['criterioO'];
            $listadoA=$_POST['criterioA'];
            $id_rubrica= rubrica::all() -> last();
            for ($i=0;$i<sizeof($_POST['criterioO']);$i++){
                $rubrucad=new rubrica_detalle();
                $rubrucad->criterio_id=$listadoO[$i];
                $rubrucad->rubrica_id =$id_rubrica->id;
                $rubrucad->estado_id =$_POST['modulo'];
                $rubrucad->save();
            }
            for ($i=0;$i<sizeof($_POST['criterioA']);$i++){
                $rubrucad=new rubrica_detalle();
                $rubrucad->criterio_id=$listadoA[$i];
                $rubrucad->rubrica_id =$id_rubrica->id;
                $rubrucad->estado_id =$_POST['estado'];
                $rubrucad->save();
            }
            $result=true;

        }else{
            $errors=$validator->getMessages();
        }

        $modulos=modulo::all();
        $operacional=criterio::all()->where('aspecto_id','=',1);
        $actitudinal=criterio::all()->where('aspecto_id','=',2);

        return $this->render('admin/registro_rubrica.twig',[
            'result'=>$result,
            'errors'=>$errors,
            'modulo'=>$modulos,
            'operacional'=>$operacional,
            'actitudinal'=>$actitudinal
        ]);

    }

    public function getAutoevaluacion()
    {
        $autoevaluacion=criterio::all()->where('aspecto_id','=',3);

        return $this->render('admin/registro_autoevaluacion.twig',[
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
            $rubrica= new rubrica_autoevaluacion();
            $rubrica->nombre=$_POST['nombre'];
            $rubrica->save();
            $listadoA=$_POST['criterioA'];
            $id_rubrica= rubrica_autoevaluacion::all() -> last();
            for ($i=0;$i<sizeof($_POST['criterioA']);$i++){
                $rubrucad=new rubrica_autoevaluacion_detalle();
                $rubrucad->criterio_id=$listadoA[$i];
                $rubrucad->rubrica_autoevaluacion_id =$id_rubrica->id;
                $rubrucad->estado_id =$_POST['estado'];
                $rubrucad->save();
            }
            $result=true;

        }else{
            $errors=$validator->getMessages();
        }

        $autoevaluacion=criterio::all()->where('aspecto_id','=',1);

        return $this->render('admin/registro_autoevaluacion.twig',[
            'result'=>$result,
            'errors'=>$errors,
            'autoevaluacion'=>$autoevaluacion
        ]);

    }


}