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
        $cepInfo = $this->correios->getCep($cep);

        $status = empty($cepInfo) ? 404 : 200;

        return response()->json($cepInfo, $status);
    }
}
