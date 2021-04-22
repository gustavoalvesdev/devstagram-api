<?php

namespace Controllers;

use \Core\Controller;

class HomeController extends Controller 
{

    public function index() 
    {
        $array = array(
            'nome' => 'Gustavo',
            'idade' => 29
        );

        $this->returnJson($array);
    }

    public function testando()
    {
        echo 'FUNCIONOU';
    }

    public function visualizarUsuarios($id)
    {
        echo 'ID: ' . $id;
    }

}
