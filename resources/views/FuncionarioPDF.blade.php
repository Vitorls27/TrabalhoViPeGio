<!DOCTYPE html>
<html>
<head>
    <title>Funcionários Da Café|Vip</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>Lista de todos os funcionários da Café|Vip e suas respectivas informações</p>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Setor</th>
            <th>Foto</th>
        </tr>
        @foreach($funcionarios as $item)
            @php
                $nome_imagem = !empty($item->imgfun) ? $item->imgfun : 'sem_imagem.jpg';
            @endphp
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nome}}</td>
                <td>{{$item->telefone}}</td>
                <td>{{$item->email}}</td>
                <td>@foreach($setores as $tabela)
                        @if ($tabela->id == $item->setor_id) {{$tabela->nome}} @endif
                    @endforeach</td>
                <td><img src="{{storage_path('app/public/'.$nome_imagem)}}" width="100px" class="img-thumbnail" /></td>
            </tr>
        @endforeach
    </table>
</body>
</html>
