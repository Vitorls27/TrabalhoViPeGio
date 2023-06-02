@extends('base.app')

@section('conteudo')
    @php
        if (!empty($leitura->id)) {
            $route = route('leitura.update', $leitura->id);
        } else {
            $route = route('leitura.store');
        }
        $leitura->data_leitura = date('d/m/Y', strtotime($leitura->data_leitura));
    @endphp
@section('tituloPagina', 'Formulário do Sensor')
<h1>Formulário do Sensor</h1>

<div class="col">
    <div class="row">
        <form action='{{ $route }}' method="POST" enctype="multipart/form-data">
            @csrf
            @if (!empty($leitura->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id"
                value="@if (!empty(old('id'))) {{ old('id') }} @elseif(!empty($leitura->id)) {{ $leitura->id }} @else {{ '' }} @endif" /><br>
            <div class="col-3">
                <label class="form-label">data da leitura</label><br>
                <input type="date" class="form-control" name="data_leitura"
                    value= @if (!empty(old($leitura->data_leitura))) {{old($leitura->data_leitura)}} @elseif(!empty($leitura->data_leitura)) {{$leitura->data_leitura}} @else {{ '' }} @endif />
                    <label>@if (!empty(old($leitura->data_leitura))) {{old($leitura->data_leitura)}} @else {{'Data anterior: '.$leitura->data_leitura}} @endif</label><br><br>
            </div>
            <div class="col-3">
                <label class="form-label">hora da leitura</label><br>
                <input type="time" class="form-control" name="hora_leitura"
                    value= @if (!empty(old($leitura->hora_leitura))) {{old($leitura->hora_leitura)}} @elseif(!empty($leitura->hora_leitura)) {{$leitura->hora_leitura}} @else {{ '' }} @endif />
                    <label>@if (!empty(old($leitura->hora_leitura))) {{old($leitura->hora_leitura)}} @else {{'Hora anterior: '.$leitura->hora_leitura}} @endif</label><br><br>
            </div>
            <div class="col-3">
                <label class="form-label">valor do sensor</label><br>
                <input type="number" class="form-control" name="valor_sensor"
                    value= @if (!empty(old($leitura->valor_sensor))) {{ old($leitura->valor_sensor) }} @else {{$leitura->valor_sensor}} @endif /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Sensor</label><br>
                <select name="sensor_id" class="form-select">
                    @foreach ($sensor as $item)
                        <option value="{{ $item->id }}">{{ $item->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <label class="form-label">mac</label><br>
                <select name="mac_id" class="form-select">
                    @foreach ($mac as $item)
                        <option value="{{ $item->id }}">{{ $item->nome }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success" type="submit">
                <i class="fa-solid fa-save"></i> Salvar
            </button>
            <a href="{{ route('leitura.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                Voltar</a> <br><br>
        </form>
    </div>
</div>
</div>
@endsection
