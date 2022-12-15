<?php 

require_once 'environment.php';



global $config;

$config = array();

if (ENVIRONMENT === 'development') {
    define('BASE_URL', 'http://localhost/estrutura_mvc/');
    $config['dbname'] = 'mvc_psr4';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
    $config['jwt_secret_key'] = 'abC123!';
} else if (ENVIRONMENT === 'production') {
    define('BASE_URL', 'http://localhost/estrutura_mvc/');
    $config['dbname'] = 'mvc_psr4';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
    $config['jwt_secret_key'] = 'abC123!';
}

global $db;

try {

    $db = new PDO('mysql:host='.$db_config['host'].';dbname='.$db_config['dbname'], $db_config['dbuser'], $db_config['dbpass']);

} catch(PDOException $e) {
    echo 'ERRO: ' . $e->getMessage();
    exit;
}
