@extends('base.app')

@section('conteudo')
    @php
        if (!empty($cardapio->id)) {
            $route = route('cardapio.update', $cardapio->id);
        } else {
            $route = route('cardapio.store');
        }
    @endphp
@section('tituloPagina', 'Formulário Cardápio')
<h1>Formulário para Cardápio</h1>

<div class="col">
    <div class="row">
        <form action='{{ $route }}' method="POST" enctype="multipart/form-data">
            @csrf
            @if (!empty($cardapio->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id"
                value="@if (!empty(old('id'))) {{ old('id') }} @elseif(!empty($cardapio->id)) {{ $cardapio->id }} @else {{ '' }} @endif" /><br>
            <div class="col-3">
                <label class="form-label">Nome</label><br>
                <input type="text" class="form-control" name="nome"
                    value="@if (!empty(old('nome'))) {{ old('nome') }} @elseif(!empty($cardapio->nome)) {{ $cardapio->nome }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Valor(R$)</label><br>
                <input type="text" class="form-control" name="valor"
                    value="@if (!empty(old('valor'))) {{ old('valor') }} @elseif(!empty($cardapio->valor)) {{ $cardapio->valor }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Tipo de Produto</label><br>
                <select name="tipo_id" class="form-select">
                    <option value="1">salgado</option>
                    <option value="2">doce</option>
                    <option value="3">bebida</option>
                </select>
            </div>
            <div class="col-3">
                <label class="form-label">Descrição</label><br>
                <input type="descriçao" class="form-control" name="descriçao"
                    value="@if (!empty(old('descriçao'))) {{ old('descriçao') }} @elseif(!empty($cardapio->descriçao)) {{ $cardapio->descriçao }} @else {{ '' }} @endif" /><br>
            </div>
            @php
                $nome_imagem = !empty($cardapio->imgprod) ? $cardapio->imgprod : 'sem_imagem.jpg';
            @endphp
            <div class="col-6">
                <br>
                <img class="img-thumbnail" src="/storage/{{ $nome_imagem }}" width="300px" />
                <br><br>
                <input type="file" class="form-control" name="imgprod" /><br>
            </div>
            <button class="btn btn-success" type="submit">
                <i class="fa-solid fa-save"></i> Salvar
            </button>
            <a href="{{ route('cardapio.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                Voltar</a> <br><br>
        </form>
    </div>
</div>
</div>
@endsection
