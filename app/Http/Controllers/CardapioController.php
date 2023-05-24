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
                'valor' => 'required | max: 10',
                'descriçao' => 'nullable',
                'imgprod' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 120 caracteres',
                'valor.required' => 'O valor é obrigatório',
                'valor.max' => 'Só é permitido 10 caracteres',
            ]
        );

        $imgprod = $request->file('imgprod');
        $nome_arquivo = '';
        if ($imgprod) {
            $nome_arquivo =
                date('YmdHis') . '.' . $imgprod->getClientOriginalExtension();

            $diretorio = 'imagem/';
            $imgprod->storeAs($diretorio, $nome_arquivo, 'public');
            $nome_arquivo = $diretorio . $nome_arquivo;
        }

        //dd( $request->nome);
        Cardapio::create([
            'nome' => $request->nome,
            'valor' => $request->valor,
            'descriçao' => $request->descriçao,
            'imgprod' => $nome_arquivo,
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
                'valor' => 'required | max: 10',
                'descriçao' => 'nullable',
                'imgprod' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 120 caracteres',
                'valor.required' => 'O valor é obrigatório',
                'valor.max' => 'Só é permitido 10 caracteres',
            ]
        );

        $imgprod = $request->file('imgprod');
        $nome_arquivo = '';
        if ($imgprod) {
            $nome_arquivo =
                date('YmdHis') . '.' . $imgprod->getClientOriginalExtension();

            $diretorio = 'imagem/';
            $imgprod->storeAs($diretorio, $nome_arquivo, 'public');
            $nome_arquivo = $diretorio . $nome_arquivo;
        }

        Cardapio::updateOrCreate(
            ['id' => $request->id],
            [
                'nome' => $request->nome,
                'valor' => $request->valor,
                'descriçao' => $request->descriçao,
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
