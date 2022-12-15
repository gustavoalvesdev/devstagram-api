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
                    $array['error'] = 'Access Denied';

                }

            } else {
                $array['error'] = 'E-mail e/ou senha não preenchido(s)';
            }

        } else {
            $array['error'] = 'Método de requisição incompatível!';
        }

        $this->returnJson($array);
    }
}
