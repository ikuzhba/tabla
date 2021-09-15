<?php

require 'vendor/autoload.php';

use App\Controller\Home as HomeController;

$controller = new HomeController('home/index.php');
$data = $controller->generate();
echo $controller->view(['data'=>$data]);
