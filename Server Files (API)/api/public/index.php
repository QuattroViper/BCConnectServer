<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

include_once("./configs/connection.php");
include_once("./configs/fakes.php");
include_once("./configs/functions.php");
include_once("./configs/sql.php");
include_once("./configs/errorHandling.php");
include_once("./configs/configuration.php");

$app = new \Slim\App;


 require_once('./signin.php');
 require_once('./settings.php');
 require_once('./event.php');
 require_once('./announcement.php');
 require_once('./administration.php');
 require_once('./communicate.php');
 require_once('./misc.php');
 require_once('./student.php');

$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->run();