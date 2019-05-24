<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \App\Correios\CorreiosScraper as Scraper;

class CorreiosController
{
    /**
     * @var Scraper
     */
    protected $scraper;

    public function __construct(Scraper $scraper) {
        $this->scraper = $scraper;
    }

    public function fetchCepInfo(Request $request, Response $response, array $args) {
        $cep = $args['cep'];
        $result = $this->scraper->getCepInfo($cep);
        $response = $response->withJson($result);

        return $response;
    }

    public function fetchTrackingInfo(Request $request, Response $response, array $args) {
        $track = $args['track'];
        $result = $this->scraper->getPackageInfo($track);
        $response = $response->withJson($result);

        return $response;
    }
}