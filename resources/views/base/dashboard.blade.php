@extends('base.app')
@section('conteudo')
@section('tituloPagina', 'Princípal')
<div class="col" style="padding: 5%">
    <div class="row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body" style="text-align: center;">
                    <h5 class="card-title">Sensor de Temperatura da Água</h5>
                    <p class="card-text">O nosso sensor de temperatura da água garante que o café seja feito na temperatura ideal,<br> entre  C° e  C°, para que seja mantido o sabor característico do café.</p>
                    <a href="{{ url('/leitura') }}" class="btn btn-primary">Verificar Sensor</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
