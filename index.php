<?php 

session_start();

require_once 'config.php';
require_once 'vendor/autoload.php';

use Core\Core;

$core = new Core();
$core->run();
