<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cardapio;
use App\Models\Tipo;
use Illuminate\Support\Facades\Storage;

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
        $tipos = Tipo::orderBy('nome')->get();

        return view('CardapioForm')->with(['tipos' => $tipos]);
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required | max: 120',
                'valor' => 'required | max: 10',
                'tipo_id' => ' nullable',
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
        $dados = [
            'nome' => $request->nome,
            'valor' => $request->valor,
            'tipo_id' => $request->tipo_id,
            'descriçao' => $request->descriçao,
        ];

        $imgprod = $request->file('imgprod');
        $nome_arquivo = '';
        //verifica se o campo imgprod foi passado uma imgprod
        if ($imgprod) {
            $nome_arquivo = date('YmdHis') . '.' . $imgprod->getClientOriginalExtension();
            $diretorio = 'imagem/';
            //salva a imgprod em uma pasta
            $imgprod->storeAs($diretorio, $nome_arquivo, 'public');
            //adiciona ao vetor o diretorio do arquivo e o nome
            $dados['imgprod'] = $diretorio . $nome_arquivo;
        }

        //dd( $request->nome);
        Cardapio::create($dados);

        return \redirect()->action(
            'App\Http\Controllers\CardapioController@index'
        );
    }

    function edit($id)
    {
        //select * from usuario where id = $id;
        $cardapio = Cardapio::findOrFail($id);
        //dd($cardapio);
        $tipos = Tipo::orderBy('nome')->get();

        return view('cardapioForm')->with([
            'cardapio' => $cardapio,
            'tipos' => $tipos,
        ]);
    }

    function show($id)
    {
        //select * from cardapio where id = $id;
        $cardapio = Cardapio::findOrFail($id);
        //dd($cardapio);
        $tipos = Tipo::orderBy('nome')->get();

        return view('CardapioForm')->with([
            'cardapio' => $cardapio,
            'tipos' => $tipos,
        ]);
    }

    function update(Request $request)
    {
        //dd( $request->nome);
        $request->validate(
            [
                'nome' => 'required | max: 120',
                'valor' => 'required | max: 10',
                'tipo_id' => ' nullable',
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
        $dados = [
            'nome' => $request->nome,
            'valor' => $request->valor,
            'tipo_id' => $request->tipo_id,
            'descriçao' => $request->descriçao,
        ];


        $imgprod = $request->file('imgprod');
        $nome_arquivo = '';
        //verifica se o campo imgprod foi passado uma imgprod
        if ($imgprod) {
            $nome_arquivo = date('YmdHis') . '.' . $imgprod->getClientOriginalExtension();
            $diretorio = 'imagem/';
            //salva a imgprod em uma pasta
            $imgprod->storeAs($diretorio, $nome_arquivo, 'public');
            //adiciona ao vetor o diretorio do arquivo e o nome
            $dados['imgprod'] = $diretorio . $nome_arquivo;
        }

        Cardapio::updateOrCreate(
            ['id' => $request->id],
            $dados
        );

        return \redirect()->action(
            'App\Http\Controllers\CardapioController@index'
        );
    }
    //

    function destroy($id)
    {
        $cardapio = Cardapio::findOrFail($id);

        if ($cardapio->imgprod){
            Storage::disk('public')->delete($cardapio->imgprod);
        }
        $cardapio->delete();

        return \redirect('cardapio')->with('success', 'Atualizado com sucesso!');
    }

    function search(Request $request)
    {
        if ($request->campo) {
            $cardapios = Cardapio::where(
                $request->campo,
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $cardapios = Cardapio::all();
        }

        //dd($cardapios);
        return view('cardapioList')->with(['cardapios' => $cardapios]);
    }
}
