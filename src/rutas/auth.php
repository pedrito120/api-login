<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

$app->get('/api/auth', function (Request $request, Response $response, array $args) {
    $response->getBody()->write('hola mundo');
    return $response;
});

$app->post('/api/auth/login', function (Request $request, Response $response, array $args) {
    $data = $request->getParsedBody();
    $email = $data['email'];
    $password = $data['password'];

    //$response->getBody()->write($email);
   if ($email === 'user@example.com' && $password === 'qwerty123') {
        
        $response->getBody()->write(json_encode(['success' => true, 'token' => 'token1234']));
        
    } else {
        $response->getBody()->write(json_encode(['error' => 'Credenciales incorrectas', "code"=> 401]));
    }
    return $response;
});