@extends('base.app')

@section('conteudo')
    @php
        if (!empty($usuario->id)) {
            $route = route('estoque.update', $estoque->id);
        } else {
            $route = route('estoque.store');
        }
    @endphp
@section('tituloPagina', 'Formulário Estoque')
<h1>Formulário para Estoque</h1>

<div class="col">
    <div class="row">
        <form action='{{ $route }}' method="POST" enctype="multipart/form-data">
            @csrf
            @if (!empty($estoque->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id"
                value="@if (!empty(old('id'))) {{ old('id') }} @elseif(!empty($estoque->id)) {{ $estoque->id }} @else {{ '' }} @endif" /><br>
            <div class="col-3">
                <label class="form-label">Nome</label><br>
                <input type="text" class="form-control" name="nome"
                    value="@if (!empty(old('nome'))) {{ old('nome') }} @elseif(!empty($estoque->nome)) {{ $estoque->nome }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Peso por Uni.</label><br>
                <input type="text" class="form-control" name="peso"
                    value="@if (!empty(old('peso'))) {{ old('peso') }} @elseif(!empty($estoque->peso)) {{ $estoque->peso }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Valor(R$) por Uni.</label><br>
                <input type="valor" class="form-control" name="valor"
                    value="@if (!empty(old('valor'))) {{ old('valor') }} @elseif(!empty($estoque->valor)) {{ $estoque->email }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Quantidade</label><br>
                <input type="quantidade" class="form-control" name="quantidade"
                    value="@if (!empty(old('quantidade'))) {{ old('quantidade') }} @elseif(!empty($estoque->quantidade)) {{ $estoque->email }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Tipo de Produto</label><br>
                <select name="tipo_id" class="form-select">
                    <option value="1">salgado</option>
                    <option value="2">doce</option>
                    <option value="3">bebida</option>
                </select>
            </div>
            <button class="btn btn-success" type="submit">
                <i class="fa-solid fa-save"></i> Salvar
            </button>
            <a href="{{ route('estoque.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                Voltar</a>
        </form>
    </div>
</div>
</div>
@endsection