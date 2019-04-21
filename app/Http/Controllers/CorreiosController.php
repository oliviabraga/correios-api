<?php

namespace App\Http\Controllers;

use App\Correios\CorreiosScraper;
use Illuminate\Http\Request;

class CorreiosController extends Controller
{
    /**
     * @var CorreiosScraper
     */
    private $correios;

    public function __construct(CorreiosScraper $correios)
    {
        $this->correios = $correios;
    }

    public function getCep(Request $request)
    {
        $query = $request->query('busca', '');

        if ($query === '') {
            return response('', 400);
        }

        $cepInfo = $this->correios->getCepInfo($query);

        $status = empty($cepInfo) ? 404 : 200;

        return response()->json($cepInfo, $status);
    }

    public function getPackageInfo(Request $request)
    {
        return $this->correios->getPackageInfo('LS814040196CH');
    }
}
