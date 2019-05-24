<?php

declare(strict_types=1);

namespace App;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \App\Correios\CorreiosScraper as Scraper;

require '../../vendor/autoload.php';

$app = new \Slim\App;

$container = $app->getContainer();
$container['scraper'] = function($container) {
    $scraper = new Scraper();
    return $scraper;
};

$app->get('/cep/{cep}', function(Request $request, Response $response, array $args) {
    $cep = $args['cep'];

    $result = $this->scraper->getCepInfo($cep);

    $response = $response->withJson($result);

    return $response;
});

$app->get('/track/{code}', function(Request $request, Response $response, array $args) {
    $trackingCode = $args['code'];

    $result = $this->scraper->getPackageInfo($trackingCode);

    $response = $response->withJson($result);

    return $response;
});

$app->run();