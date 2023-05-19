<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Categoria;

class FuncionarioController extends Controller
{
    function index()
    {
        $funcionarios = Funcionario::All();
        // dd($funcionarios);

        return view('FuncionarioList')->with(['funcionarios' => $funcionarios]);
    }

    function create()
    {
        $categorias = Categoria::orderBy('nome')->get();

        return view('FuncionarioForm')->with(['categorias' => $categorias]);
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required | max: 120',
                'telefone' => 'required | max: 20',
                'email' => ' nullable | email | max: 100',
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
        Funcionario::create([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'categoria_id' => $request->categoria_id,
            'imagem' => $nome_arquivo,
        ]);

        return \redirect()->action(
            'App\Http\Controllers\FuncionarioController@index'
        );
    }

    function edit($id)
    {
        //select * from Funcionario where id = $id;
        $funcionario = Funcionario::findOrFail($id);
        //dd($Funcionario);
        $categorias = Categoria::orderBy('nome')->get();

        return view('FuncionarioForm')->with([
            'Funcionario' => $funcionario,
            'categorias' => $categorias,
        ]);
    }

    function show($id)
    {
        //select * from funcionario where id = $id;
        $funcionario = Funcionario::findOrFail($id);
        //dd($usuario);
        $categorias = Categoria::orderBy('nome')->get();

        return view('FuncionarioForm')->with([
            'funcionario' => $funcionario,
            'categorias' => $categorias,
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

        Funcionario::updateOrCreate(
            ['id' => $request->id],
            [
                'nome' => $request->nome,
                'telefone' => $request->telefone,
                'email' => $request->email,
                'imagem' => $nome_arquivo,
            ]
        );

        return \redirect()->action(
            'App\Http\Controllers\funcionarioController@index'
        );
    }
    //

    function destroy($id)
    {
        $funcionario = Funcionario::findOrFail($id);

        $funcionario->delete();

        return \redirect()->action(
            'App\Http\Controllers\funcionarioController@index'
        );
    }

    function search(Request $request)
    {
        if ($request->campo == 'nome') {
            $funcionarios = Funcionario::where(
                'nome',
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $funcionarios = Funcionario::all();
        }

        //dd($funcionarios);
        return view('funcionarioList')->with(['funcionarios' => $funcionarios]);
    }
}
