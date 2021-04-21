<?php 

namespace Core;

class Controller 
{

    public function loadView($viewName, $viewData = array()) 
    {
        extract($viewData);
        
        require_once 'Views/'.$viewName.'.php';
    } 

    public function loadTemplate($viewName, $viewData = array())
    {
        require_once 'Views/template.php';
    }

    public function LoadViewInTemplate($viewName, $viewData = arraY())
    {
        extract($viewData);
        require_once 'Views/'.$viewName.'.php';
    }

    public function actionNotFound() 
    {
        $this->loadView('not-found');
    }
}
