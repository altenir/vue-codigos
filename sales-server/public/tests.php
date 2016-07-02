<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("Hello World");
    return $response;
});

$app->get('/databases', function (Request $request, Response $response) {

    $dbs = getDB()->query( 'SHOW DATABASES' );
    while( ( $db = $dbs->fetchColumn( 0 ) ) !== false )
    {
        $response->getBody()->write($db . ", ");
    }

    return $response;
});
