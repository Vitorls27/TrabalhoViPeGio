@extends('base.app')

@section('conteudo')
@section('tituloPagina', 'Listagem de Produtos')
<h1>Listagem de Produtos(Cardápio)</h1>
<form action="{{ route('cardapio.search') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-2">
            <select name="campo" class="form-select">
                <option value="nome">Nome</option>
                <option value="valor">Valor(R$)</option>
            </select>
        </div>
        <div class="col-4">
            <input type="text" class="form-control" placeholder="Pesquisar" name="valor" />
        </div>
        <div class="col-6">
            <button class="btn btn-primary" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i> Buscar
            </button>
            <a class="btn btn-success" href="{{ action('App\Http\Controllers\CardapioController@create') }}"><i
                class="fa-solid fa-plus"></i> Cadastrar</a>
            <a class="btn btn-info" href="{{ action('App\Http\Controllers\PDFController@generateCardapioPDF') }}"><i
                class="fa-solid fa-print"></i> Baixar PDF</a>
        </div>
    </div>
</form>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Valor(R$)</th>
            <th scope="col">Tipo</th>
            <th scope="col">Descrição</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cardapios as $item)
            @php
                $nome_imagem = !empty($item->imgprod) ? $item->imgprod : 'sem_imagem.jpg';
            @endphp
            <tr>
                <td scope='row'>{{ $item->id }}</td>
                <td>{{ $item->nome }}</td>
                <td>{{ $item->valor }}</td>
                <td>{{ $item->tipo->nome }}</td>
                <td style="width: 30%; text-align: center;">{{ $item->descriçao }}</td>
                <td><img src="/storage/{{ $nome_imagem }}" width="100px" class="img-thumbnail" /> </td>
                <td><a href="{{ action('App\Http\Controllers\CardapioController@edit', $item->id) }}"><i
                            class='fa-solid fa-pen-to-square' style='color:orange;'></i></a></td>
                <td>
                    <form method="POST" action="{{ action('App\Http\Controllers\CardapioController@destroy', $item->id) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" onclick='return confirm("Deseja Excluir?")' style='all: unset; cursor:pointer;'><i
                                class='fa-solid fa-trash' style='color:red;'></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
