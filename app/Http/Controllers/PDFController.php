<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cardapio;
use App\Models\Funcionario;
use App\Models\Tipo;
use App\Models\Setor;
use PDF;

class PDFController extends Controller
{
    function generateCardapioPDF()
    {
        $cardapios = Cardapio::orderBy('tipo_id')->get();
        $tipos = Tipo::orderBy('id')->get();
//dd($cardapios);
        $data = [
            'title' => 'Impressão do Cardápio',
            'date' => date('m/d/Y'),
            'cardapios' => $cardapios,
            'tipos' => $tipos,
        ];
        $pdf = PDF::loadView('CardapioPDF', $data);

        return $pdf->download('CardápioCaféVip.pdf');
    }


    function generateFuncionarioPDF()
    {
        $funcionarios = Funcionario::orderBy('nome')->get();
        $setores = Setor::orderBy('nome')->get();
//dd($funcionarios);
        $data = [
            'title' => 'Lista de Funcionários',
            'date' => date('m/d/Y'),
            'funcionarios' => $funcionarios,
            'setores' => $setores,
        ];
        $pdf = PDF::loadView('FuncionarioPDF', $data);

        return $pdf->download('FuncionáriosCaféVip.pdf');
    }
}
