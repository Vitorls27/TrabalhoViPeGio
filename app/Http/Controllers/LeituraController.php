<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\leitura;
use App\Models\Mac;
use App\Models\Sensor;

class LeituraController extends Controller
{
    function index()
    {
        $leituras = Leitura::all();
        // dd($leituras);

        return view('leituraList')->with(['leituras' => $leituras]);
    }

    function create()
    {
        $mac = Mac::orderBy('nome')->get();
        $sensor = Sensor::orderBy('nome')->get();
        //dd($categorias);
        return view('LeituraForm')->with(['mac' => $mac,'sensor' => $sensor]);
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'data_leitura' => 'required',
                'hora_leitura' => 'required',
                'valor_sensor' => ' required | max: 20',
                'sensor_id' => 'required',
                'mac_id' => 'required',
            ],
            [
                'data_leitura.required' => 'A data da leitura é obrigatório',
                'hora_leitura.required' => 'A hora da leitura é obrigatório',
                'valor_sensor.required' => 'O valor do sensor é obrigatório',
                'valor_sensor.max' => 'Só é permitido 20 caracteres',
            ]
        );

        //adiciono os dados do formulário ao vetor
        $dados = [
            'data_leitura' => $request->data_leitura,
            'hora_leitura' => $request->hora_leitura,
            'valor_sensor' => $request->valor_sensor,
            'sensor_id' => $request->sensor_id,
            'mac_id' => $request->mac_id,
        ];

        //dd( $request->nome);
        //passa o vetor com os dados do formulário como parametro para ser salvo
        Leitura::create($dados);

        return \redirect('leitura')->with('success', 'Cadastrado com sucesso!');
    }

    function edit($id)
    {
        //select * from leitura where id = $id;
        $leitura = Leitura::findOrFail($id);
        //dd($leitura);
        $sensor = Sensor::orderBy('nome')->get();
        $mac = Mac::orderBy('nome')->get();

        return view('LeituraForm')->with([
            'leitura' => $leitura,
            'sensor' => $sensor,
            'mac' => $mac,
        ]);
    }

    function show($id)
    {
        //select * from leitura where id = $id;
        $leitura = Leitura::findOrFail($id);
        //dd($leitura);
        $sensor = Sensor::orderBy('nome')->get();
        $mac = Mac::orderBy('nome')->get();

        return view('LeituraForm')->with([
            'leitura' => $leitura,
            'sensor' => $sensor,
            'mac' => $mac,
        ]);
    }

    function update(Request $request)
    {
        //dd( $request->nome);
        $request->validate(
            [
                'data_leitura' => 'required',
                'hora_leitura' => 'required',
                'valor_sensor' => ' required | max: 20',
                'sensor_id' => 'required',
                'mac_id' => 'required',
            ],
            [
                'data_leitura.required' => 'A data da leitura é obrigatório',
                'hora_leitura.required' => 'A hora da leitura é obrigatório',
                'valor_sensor.required' => 'O valor do sensor é obrigatório',
                'valor_sensor.max' => 'Só é permitido 20 caracteres',
            ]
        );

        //adiciono os dados do formulário ao vetor
        $dados = [
            'data_leitura' => $request->data_leitura,
            'hora_leitura' => $request->hora_leitura,
            'valor_sensor' => $request->valor_sensor,
            'sensor_id' => $request->sensor_id,
            'mac_id' => $request->mac_id,
        ];

        //metodo para atualizar passando o vetor com os dados do form e o id
        Leitura::updateOrCreate(
            ['id' => $request->id],
            $dados
        );

        return \redirect('leitura')->with('success', 'Atualizado com sucesso!');
    }

    function destroy($id){
        $leitura = Leitura::findOrFail($id);

        // verifica se existe o arquivo vinculado ao registro e depois remove
        $leitura->delete();
        return \redirect('leitura')->with('success', 'Removido com sucesso!');
    }

    function search(Request $request)
    {
        if ($request->campo == 'data_leitura' && !empty($request->valor)) {
            $leituras = Leitura::where(
                //dd(date('Y-m-d',strtotime(date('d/m/Y',strtotime($request->valor))))),
                $request->campo,
                'like',
                '%' . date('Y-m-d',strtotime(date('d/m/Y',strtotime($request->valor)))) . '%'
            )->get();
        } elseif ($request->campo) {
            $leituras = Leitura::where(
                $request->campo,
                //dd($request->valor),
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $leituras = Leitura::all();
        }

        //dd($leituras);
        return view('leituraList')->with(['leituras' => $leituras]);
    }
}
