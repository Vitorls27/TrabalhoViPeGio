@extends('base.app')

@section('conteudo')
    @php
        if (!empty($estoque->id)) {
            $route = route('estoque.update', $estoque->id);
        } else {
            $route = route('estoque.store');
        }
    @endphp
@section('tituloPagina', 'Formulário Estoque')
<h1>Formulário para Estoque</h1>

<div class="col">
    <div class="row">
        <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
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
                <label class="form-label">Custo(R$) por Uni.</label><br>
                <input type="custo" class="form-control" name="custo"
                    value="@if (!empty(old('custo'))) {{ old('custo') }} @elseif(!empty($estoque->custo)) {{ $estoque->custo }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Quantidade</label><br>
                <input type="quantidade" class="form-control" name="quantidade"
                    value="@if (!empty(old('quantidade'))) {{ old('quantidade') }} @elseif(!empty($estoque->quantidade)) {{ $estoque->quantidade }} @else {{ '' }} @endif" /><br>
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