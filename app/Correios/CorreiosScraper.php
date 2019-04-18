<?php

namespace App\Correios;

use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use Symfony\Component\DomCrawler\Crawler;

class CorreiosScraper
{

    const SITE_URL = 'http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm';
    const CEP_FORM_SELECTOR = '#Geral';

    private $client;

    public function __construct()
    {
        $this->client = new Client();
        $guzzleClient = new GuzzleClient([
            'timeout' => 60
        ]);
        $this->client->setClient($guzzleClient);
    }

    public function getCep($cep)
    {
        $headers = [];
        $values = [];

        $crawler = $this->client->request('GET', self::SITE_URL);

        $form = $crawler->selectButton('Buscar')->form();

        $form['relaxation'] = $cep;

        $resultPage = $this->client->submit($form);

        $resultPage->filter('.tmptabela tr th')->each(function (Crawler $node) use (&$headers) {
            $headers[] = trim(strip_tags($node->html()));
        });

        $resultPage->filter('.tmptabela tr td')->each(function (Crawler $node) use (&$values) {
            $values[] = trim($node->html());
        });

        $result = array_combine($headers, $values);

        return empty($result) ? null : $result;
    }

}
