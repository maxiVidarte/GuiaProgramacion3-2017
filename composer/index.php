<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '/vendor/autoload.php';
require 'cd.php';
require 'AccesoDatos.php';
$app = new \Slim\App;
$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});
//para ingresar una foto por composer se hace de la siguiente manera $files = $request->getUploadedFiles();
$app->post('/file/archivos',function (Request $request,Response $response ){
    $files = $request->getUploadedFiles();
    
});

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