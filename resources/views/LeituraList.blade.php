@extends('base.app')

@section('conteudo')
@section('tituloPagina', 'Listagem de Leituras')
<h1>Listagem de Leituras</h1>
<form action="{{ route('leitura.search') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-2">
            <select name="campo" class="form-select">
                <option value="data_leitura">data da leitura</option>
                <option value="hora_leitura">hora da leitura</option>
                <option value="valor_sensor">valor do sensor</option>
            </select>
        </div>
        <div class="col-4">
            <input type="text" class="form-control" placeholder="Pesquisar" name="valor" />
        </div>
        <div class="col-6">
            <button class="btn btn-primary" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i> Buscar
            </button>
            <a class="btn btn-success" href="{{ action('App\Http\Controllers\LeituraController@create') }}"><i
                    class="fa-solid fa-plus"></i> Cadastrar</a>
        </div>
    </div>
</form>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Data da Leitura</th>
            <th scope="col">Hora da Leitura</th>
            <th scope="col">Valor do Sensor</th>
            <th scope="col">Nome do Sensor</th>
            <th scope="col">Identificação do Mac</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($leituras as $item)
            <tr>
                <td scope='row'>{{ $item->id }}</td>
                <td>{{ $item->data_leitura }}</td>
                <td>{{ $item->hora_leitura }}</td>
                <td>{{ $item->valor_sensor }}</td>
                <td>{{ $item->sensor->nome }}</td>
                <td>{{ $item->mac->nome }}</td>
                <td><a href="{{ action('App\Http\Controllers\LeituraController@edit', $item->id) }}"><i
                            class='fa-solid fa-pen-to-square' style='color:orange;'></i></a></td>
                <td>
                    <form method="POST" action="{{ action('App\Http\Controllers\LeituraController@destroy', $item->id) }}">
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
