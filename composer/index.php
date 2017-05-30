<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '/vendor/autoload.php';
require 'cd.php';
require 'AccesoDatos.php';
$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});
$app->get('/cd', function (Request $request, Response $response) {
    $algo = cd::TraerTodoLosCds();
    $newResponse = $response->withJson($algo);
    return $newResponse;
});
$app->post('/cd', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    
    $cd =new cd();
    $cd->titulo= filter_var($data['titulo'],FILTER_SANITIZE_STRING);
    $cd->cantante= filter_var($data['cantante'], FILTER_SANITIZE_STRING);
    $cd->año= filter_var($data['año'], FILTER_SANITIZE_STRING);
    $cd->InsertarElCd();
    $respuesta = cd::TraerTodoLosCds();
    $newResponse = $response->withJson($respuesta);
    return $newResponse;
});
$app->delete('/cd', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    var_dump($data);
    $cd =new cd();
    $cd->id= filter_var($data['id'],FILTER_SANITIZE_STRING);
    $cd->BorrarCd();
    //$respuesta = cd::TraerTodoLosCds();
    //$newResponse = $response->withJson($respuesta);
    return $response;
});
$app->run();
?>