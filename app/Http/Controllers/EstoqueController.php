<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;
use App\Models\Tipo;

class EstoqueController extends Controller
{
    function index()
    {
        $estoque = Estoque::All();
        // dd($estoques);

        return view('EstoqueList')->with(['estoque' => $estoque]);
    }

    function create()
    {
        $tipos = Tipo::orderBy('nome')->get();

        return view('EstoqueForm')->with(['tipos' => $tipos]);
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required | max: 120',
                'peso' => 'required | max: 10',
                'custo' => ' required | max: 8',
                'tipo_id' => ' nullable',
                'quantidade' => ' required | max: 6',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 120 caracteres',
                'peso.required' => 'O peso é obrigatório',
                'peso.max' => 'Só é permitido 10 caracteres',
                'custo.required' => 'O custo é obrigatório',
                'custo.max' => 'Só é permitido 8 caracteres',
                'quantidade.required' => 'O quantidade é obrigatório',
                'quantidade.max' => 'Só é permitido 6 caracteres',
            ]
        );

        //dd( $request->nome);
        Estoque::create([
            'nome' => $request->nome,
            'peso' => $request->peso,
            'custo' => $request->custo,
            'tipo_id' => $request->tipo_id,
            'quantidade' => $request->quantidade,
        ]);

        return \redirect()->action(
            'App\Http\Controllers\EstoqueController@index'
        );
    }

    function edit($id)
    {
        //select * from estoque where id = $id;
        $estoque = Estoque::findOrFail($id);
        //dd($estoque);
        $tipos = Tipo::orderBy('nome')->get();

        return view('EstoqueForm')->with([
            'estoque' => $estoque,
            'tipos' => $tipos,
        ]);
    }

    function show($id)
    {
        //select * from estoque$estoque where id = $id;
        $estoque = Estoque::findOrFail($id);
        //dd($estoque);
        $tipos = Tipo::orderBy('nome')->get();

        return view('EstoqueForm')->with([
            'estoque' => $estoque,
            'tipos' => $tipos,
        ]);
    }

    function update(Request $request)
    {
        //dd( $request->nome);
        $request->validate(
            [
                'nome' => 'required | max: 120',
                'peso' => 'required | max: 10',
                'custo' => ' required | max: 8',
                'tipo_id' => ' nullable',
                'quantidade' => ' required | max: 6',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 120 caracteres',
                'peso.required' => 'O peso é obrigatório',
                'peso.max' => 'Só é permitido 10 caracteres',
                'custo.required' => 'O custo é obrigatório',
                'custo.max' => 'Só é permitido 8 caracteres',
                'quantidade.required' => 'O quantidade é obrigatório',
                'quantidade.max' => 'Só é permitido 6 caracteres',
            ]
        );

        //adiciono os dados do formulário ao vetor
        $dados =  [
            'nome' => $request->nome,
            'peso' => $request->peso,
            'custo' => $request->custo,
            'tipo_id' => $request->tipo_id,
            'quantidade' => $request->quantidade,
        ];

        //metodo para atualizar passando o vetor com os dados do form e o id
        Estoque::updateOrCreate(
            ['id' => $request->id],
            $dados
        );

        return \redirect('estoque')->with('success', 'Atualizado com sucesso!');
    }
    //

    function destroy($id)
    {
        $estoque = Estoque::findOrFail($id);

        $estoque->delete();

        return \redirect('estoque')->with('success', 'Removido com sucesso!');
    }

    function search(Request $request)
    {
        if ($request->campo == 'nome') {
            $estoque = Estoque::where(
                'nome',
                'like',
                '%' . $request->custo . '%'
            )->get();
        } else {
            $estoque = Estoque::all();
        }

        //dd($estoques);
        return view('EstoqueList')->with(['estoque' => $estoque]);
    }
}
