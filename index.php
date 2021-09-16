<?php

require 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Controller\Home as HomeController;

$request = Request::createFromGlobals();
$uri_str = trim($request->getPathInfo(), '/');
$uri = strlen($uri_str) ? explode('/', $uri_str) : [];

if(count($uri)) {
	$number = isset($uri[0]) ? intval($uri[0]): 0;
	$multiply = isset($uri[1]) ? intval($uri[1]): 0;
	$content = HomeController::generate_for($number, $multiply);

	$response = new Response(
		json_encode($content),
		Response::HTTP_OK,
		['content-type' => 'application/json; charset=utf-8']
	);
	// $response->setContent(json_encode($content));
	$response->setCharset('UTF-8');
	$response->send();
} else {
	$controller = new HomeController('home/index.php');
	$data = $controller->generate();
	$content = $controller->view([]);

	$response = new Response(
		$content,
		Response::HTTP_OK,
		['content-type' => 'text/html; charset=utf-8']
	);
	$response->setCharset('UTF-8');
	$response->send();
}
