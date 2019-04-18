<?php

namespace App\Http\Controllers;

use App\Correios\CorreiosScraper;

class CEPController extends Controller
{
    /**
     * @var CorreiosScraper
     */
    private $correios;

    public function __construct(CorreiosScraper $correios)
    {
        $this->correios = $correios;
    }

    public function getCep($cep)
    {
        return $this->correios->getCep($cep);
    }
}
