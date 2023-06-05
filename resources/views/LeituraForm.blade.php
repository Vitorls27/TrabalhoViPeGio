@extends('base.app')

@section('conteudo')
    @php
        if (!empty($leitura->id)) {
            $route = route('leitura.update', $leitura->id);
            $data_formatada = DateTime::createFromFormat('d/m/Y', $leitura->data_leitura);
        } else {
            $route = route('leitura.store');
        }
        //$leitura->data_leitura = date('d/m/Y', strtotime($leitura->data_leitura));

    @endphp
@section('tituloPagina', 'Formulário Leitura')
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
                <label class="form-label">Data da Leitura </label><br>
                <input type="date" class="form-control" name="data_leitura"
                    value=@if (!empty(old('data_leitura'))) {{old('data_leitura')}} @elseif(!empty($leitura->data_leitura)) {{date_format($data_formatada, 'Y-m-d')}} @else {{ '' }} @endif /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Hora da Leitura</label><br>
                <input type="time" class="form-control" name="hora_leitura"
                    value=@if (!empty(old('hora_leitura'))) {{ old('hora_leitura') }} @elseif(!empty($leitura->hora_leitura)) {{ $leitura->hora_leitura }} @else {{ '' }} @endif /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Valor do Sensor</label><br>
                <input type="number" class="form-control" name="valor_sensor"
                    value=@if (!empty(old('valor_sensor'))) {{ old('valor_sensor') }} @elseif(!empty($leitura->valor_sensor)) {{ $leitura->valor_sensor }} @else {{ '' }} @endif /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Nome do Sensor</label><br>
                <select name="sensor_id" class="form-select">
                    @foreach ($sensor as $item)
                        <option value="{{ $item->id }}">{{ $item->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <label class="form-label">Identificação do Mac</label><br>
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
