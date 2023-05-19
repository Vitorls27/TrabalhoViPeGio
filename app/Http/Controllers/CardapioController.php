<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cardapio;
use App\Models\Categoria;

class CardapioController extends Controller
{
    function index()
    {
        $cardapios = Cardapio::All();
        // dd($cardapios);

        return view('cardapioList')->with(['cardapios' => $cardapios]);
    }

    function create()
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view('cardapioForm')->with(['categorias' => $categorias]);
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required | max: 120',
                'custo' => 'required | max: 10',
                'imgprod' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 120 caracteres',
                'custo.required' => 'O custo é obrigatório',
                'custo.max' => 'Só é permitido 10 caracteres',
            ]
        );

        $imagem = $request->file('imgprod');
        $nome_arquivo = '';
        if ($imagem) {
            $nome_arquivo =
                date('YmdHis') . '.' . $imagem->getClientOriginalExtension();

            $diretorio = 'imagem/';
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');
            $nome_arquivo = $diretorio . $nome_arquivo;
        }

        //dd( $request->nome);
        Cardapio::create([
            'nome' => $request->nome,
            'custo' => $request->custo,
            'imagem' => $nome_arquivo,
        ]);

        return \redirect()->action(
            'App\Http\Controllers\CardapioController@index'
        );
    }

    function edit($id)
    {
        //select * from cardapio where id = $id;
        $cardapio = Cardapio::findOrFail($id);
        //dd($cardapio);
        $categorias = Categoria::orderBy('nome')->get();

        return view('CardapioForm')->with([
            'cardapio' => $cardapio,
            'categorias' => $categorias,
        ]);
    }

    function show($id)
    {
        //select * from cardapio where id = $id;
        $cardapio = Cardapio::findOrFail($id);
        //dd($cardapio);
        $categorias = Categoria::orderBy('nome')->get();

        return view('CardapioForm')->with([
            'cardapio' => $cardapio,
            'categorias' => $categorias,
        ]);
    }

    function update(Request $request)
    {
        //dd( $request->nome);
        $request->validate(
            [
                'nome' => 'required | max: 120',
                'custo' => 'required | max: 10',
                'imagem' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 120 caracteres',
                'custo.required' => 'O custo é obrigatório',
                'custo.max' => 'Só é permitido 10 caracteres',
            ]
        );

        $imagem = $request->file('imgprod');
        $nome_arquivo = '';
        if ($imagem) {
            $nome_arquivo =
                date('YmdHis') . '.' . $imagem->getClientOriginalExtension();

            $diretorio = 'imagem/';
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');
            $nome_arquivo = $diretorio . $nome_arquivo;
        }

        Cardapio::updateOrCreate(
            ['id' => $request->id],
            [
                'nome' => $request->nome,
                'custo' => $request->custo,
                'imgprod' => $nome_arquivo,
            ]
        );

        return \redirect()->action(
            'App\Http\Controllers\CardapioController@index'
        );
    }
    //

    function destroy($id)
    {
        $cardapio = Cardapio::findOrFail($id);

        $cardapio->delete();

        return \redirect()->action(
            'App\Http\Controllers\CardapioController@index'
        );
    }

    function search(Request $request)
    {
        if ($request->campo == 'nome') {
            $cardapios = Cardapio::where(
                'nome',
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $cardapios = Cardapio::all();
        }

        //dd($cardapios);
        return view('CardapioList')->with(['cardapios' => $cardapios]);
    }
}
