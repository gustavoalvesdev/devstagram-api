<?php 

namespace Controllers;

use \Core\Controller;
use \Models\User;

class UsersController extends Controller
{
    public function index()
    {

    }

    public function login()
    {
        $array = array('error' => '');

        $method = $this->getMethod();
        $data = $this->getRequestData();

        if ($method == 'POST') {

            if (!empty($data['email']) && !empty($data['pass'])) {

                $users = new User();

                if ($users->checkCredentials($data['email'], $data['pass'])) {

                    $array['jwt'] = $users->createJwt();

                } else {
                    http_response_code(403);
                    $array['error'] = 'Acesso Negado';

                }

            } else {
                $array['error'] = 'E-mail e/ou senha não preenchido(s)';
            }

        } else {
            $array['error'] = 'Método de requisição incompatível!';
        }

        $this->returnJson($array);
    }

    public function new_record() {
        $array = array('error' => '');

        $method = $this->getMethod();
        $data = $this->getRequestData();

        if ($method == 'POST') {

            if (!empty($data['name']) && !empty($data['email']) && !empty($data['pass'])) {

                if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {

                    $users = new User();

                    if ($users->create($data['name'], $data['email'], $data['pass'])) {

                        $array['jwt'] = $users->createJwt();

                    } else {
                        $array['error'] = 'E-mail já existente';
                    }

                } else {
                    $array['error'] = 'E-mail inválido';
                }

            } else {
                $array['error'] = 'Dados não preenchidos';
            }

        } else {
            $array['error'] = 'Método de requisição incompatível';
        }

        $this->returnJson($array);
    }

    public function view($id) {
        $array = array('error' => '', 'logged' => false);

        $method = $this->getMethod();
        $data = $this->getRequestData();

        $users = new User();

        if (!empty($data['jwt']) && ($users->validateJwt($data['jwt']))) {

            $array['logged'] = true;

            $array['is_me'] = false;

            if ($id == $users->getId()) {
                $array['is_me'] = true;
            }

            switch($method) {
                case 'GET':
                    break;
                case 'PUT':
                    break;
                case 'DELETE':
                    break;
                default:
                    $array['error'] = 'Método ' . $method . ' não disponível';
            }

        } else {
            $array['error'] = 'Acesso negado';
        }

        $this->returnJson($array);
    }
}
