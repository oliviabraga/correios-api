<?php

namespace App;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \App\Correios\CorreiosScraper as Scraper;
use \App\Controllers\CorreiosController;

require '../../vendor/autoload.php';

$app = new \Slim\App;

$container = $app->getContainer();
$container['scraper'] = function($container) {
    $scraper = new Scraper();
    return $scraper;
};
$container['App\Controllers\CorreiosController'] = function($container) {
    $scraper = $container->get('scraper');
    return new CorreiosController($scraper);
};

$app->get('/api/v0/cep/{cep}', 'App\Controllers\CorreiosController:fetchCepInfo');
$app->get('/api/v0/track/{track}', 'App\Controllers\CorreiosController:fetchTrackingInfo');

$app->run();