<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

$app->post('/api/home/set_data', function (Request $request, Response $response, array $args) {
    $data = $request->getParsedBody();
    if (isset($data['nombre']) && isset($data['opcion']) ){
        $response->getBody()->write(json_encode(['success' => true, 'message' => 'Gracias '.$data['nombre'].', tu informacion se ha guardado ' ]));
    } else {
        $response->getBody()->write(json_encode(['success' => false, 'message' => 'faltan datos por enviar']));
    }
    return $response;
   
});