<!DOCTYPE html>
<html>
<head>
    <title>Cardápio Da Café|Vip</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>Os melhores sabores do Brasil, confira nossas opções</p>

    <table class="table table-bordered">
        @foreach ($tipos as $tabela)
            <h3>{{$tabela->nome}}</h3>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Valor(R$)</th>
                <th>Descrição</th>
                <th>Imagem</th>
            </tr>
            @foreach($cardapios as $item)
            @php
                $nome_imagem = !empty($item->imgprod) ? $item->imgprod : 'sem_imagem.jpg';
            @endphp
                @if ($tabela->id == $item->tipo_id)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->nome}}</td>
                        <td>{{$item->valor}}</td>
                        <td>{{$item->descriçao}}</td>
                        <td><img src="{{storage_path('app/public/'.$nome_imagem)}}" width="100px" class="img-thumbnail" /></td>
                    </tr>
                @endif
            @endforeach
        @endforeach
    </table>
</body>
</html>
