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

        return view('EstoqueList')->with(['estoques' => $estoque]);
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
                'telefone' => 'required | max: 20',
                'email' => ' nullable | email | max: 100',
                'tipo_id' => ' nullable',
                'imagem' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 120 caracteres',
                'telefone.required' => 'O telefone é obrigatório',
                'telefone.max' => 'Só é permitido 20 caracteres',
                'email.max' => 'Só é permitido 100 caracteres',
            ]
        );

        $imagem = $request->file('imagem');
        $nome_arquivo = '';
        if ($imagem) {
            $nome_arquivo =
                date('YmdHis') . '.' . $imagem->getClientOriginalExtension();

            $diretorio = 'imagem/';
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');
            $nome_arquivo = $diretorio . $nome_arquivo;
        }

        //dd( $request->nome);
        Estoque::create([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'tipo_id' => $request->tipo_id,
            'imagem' => $nome_arquivo,
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
                'telefone' => 'required | max: 20',
                'email' => ' nullable | email | max: 100',
                'tipo_id' => ' nullable',
                'imagem' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 120 caracteres',
                'telefone.required' => 'O telefone é obrigatório',
                'telefone.max' => 'Só é permitido 20 caracteres',
                'email.max' => 'Só é permitido 100 caracteres',
            ]
        );

        $imagem = $request->file('imagem');
        $nome_arquivo = '';
        if ($imagem) {
            $nome_arquivo =
                date('YmdHis') . '.' . $imagem->getClientOriginalExtension();

            $diretorio = 'imagem/';
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');
            $nome_arquivo = $diretorio . $nome_arquivo;
        }

        Estoque::updateOrCreate(
            ['id' => $request->id],
            [
                'nome' => $request->nome,
                'telefone' => $request->telefone,
                'email' => $request->email,
                'tipo_id' => $request->tipo_id,
                'imagem' => $nome_arquivo,
            ]
        );

        return \redirect()->action(
            'App\Http\Controllers\EstoqueController@index'
        );
    }
    //

    function destroy($id)
    {
        $estoque = Estoque::findOrFail($id);

        $estoque->delete();

        return \redirect()->action(
            'App\Http\Controllers\EstoqueController@index'
        );
    }

    function search(Request $request)
    {
        if ($request->campo == 'nome') {
            $estoques = Estoque::where(
                'nome',
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $estoques = Estoque::all();
        }

        //dd($estoques);
        return view('EstoqueList')->with(['estoques' => $estoques]);
    }
}
