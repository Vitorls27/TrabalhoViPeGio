@extends('base.app')

@section('conteudo')
    @php
        if (!empty($funcionario->id)) {
            $route = route('funcionario.update', $funcionario->id);
        } else {
            $route = route('funcionario.store');
        }
    @endphp
@section('tituloPagina', 'Formulário Funcionário')
<h1>Formulário para Funcionário</h1>

<div class="col">
    <div class="row">
        <form action='{{ $route }}' method="POST" enctype="multipart/form-data">
            @csrf
            @if (!empty($funcionario->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id"
                value="@if (!empty(old('id'))) {{ old('id') }} @elseif(!empty($funcionario->id)) {{ $funcionario->id }} @else {{ '' }} @endif" /><br>
            <div class="col-3">
                <label class="form-label">Nome</label><br>
                <input type="text" class="form-control" name="nome"
                    value="@if (!empty(old('nome'))) {{ old('nome') }} @elseif(!empty($funcionario->nome)) {{ $funcionario->nome }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Telefone</label><br>
                <input type="tel" class="form-control" name="telefone"
                    value="@if (!empty(old('telefone'))) {{ old('telefone') }} @elseif(!empty($funcionario->telefone)) {{ $funcionario->telefone }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">E-mail</label><br>
                <input type="email" class="form-control" name="email"
                    value="@if (!empty(old('email'))) {{ old('email') }} @elseif(!empty($funcionario->email)) {{ $funcionario->email }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Setor</label><br>
                <select name="setor_id" class="form-select">
                    @foreach ($setor as $item)
                        <option value="{{ $item->id }}" >{{ $item->nome }}</option>
                    @endforeach
                </select>
            </div>
            @php
                $nome_imagem = !empty($funcionario->imgfun) ? $funcionario->imgfun : 'sem_imagem.jpg';
            @endphp
            <div class="col-6">
                <br>
                <img class="img-thumbnail" src="/storage/{{ $nome_imagem }}" width="300px" />
                <br><br>
                <input type="file" class="form-control" name="imgfun" /><br>
            </div>
            <button class="btn btn-success" type="submit">
                <i class="fa-solid fa-save"></i> Salvar
            </button>
            <a href="{{ route('funcionario.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                Voltar</a> <br><br>
        </form>
    </div>
</div>
</div>
@endsection
