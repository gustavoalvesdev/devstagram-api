<?php 

namespace Core;

class Controller 
{
    // pega o método da requisição
    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    // pega os dados da requisição independente do método
    public function getRequestData()
    {
        switch($this->getMethod()) {
            case 'GET':
                return $_GET;
                break;
            case 'PUT':
            case 'DELETE':
                // dados vêm em forma de query string e
                // precisam ser convertidos para array
                // parse_str preenche a variável em forma de objeto
                parse_str(file_get_contents('php://input'), $data);

                // portanto ela precisa ser convertida em formato
                // de array para ser retornada
                return (array) $data;
                break;
            case 'POST':
                $data = json_decode(file_get_contents('php://input'));

                // proteção para dados que venham via $_POST e não no header
                if ($data == null) $data = $_POST;

                return (array) $data;
                break;
        }
    }

    // responsável pelo retorno em JSON
    public function returnJson($array)
    {
        header('Content-Type: application/json');
        
        echo json_encode($array);
        exit;
    }
}
