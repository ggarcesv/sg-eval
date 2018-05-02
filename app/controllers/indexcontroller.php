<?php

namespace app\controllers;

class indexcontroller extends basecontroller
{
    public function getIndex()
    {
        return $this->render('index.twig');
    }
}
