<?php

namespace Controllers;

use \Core\Controller;
use \Models\Usuario;

class HomeController extends Controller {

    public function index() 
    {
        $array = array();

        $usuarios = new Usuario();
        $array['lista'] = $usuarios->getAll();

        $this->loadTemplate('home', $array);
    }

}
