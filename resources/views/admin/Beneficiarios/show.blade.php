@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Infromación de {{ $beneficiario->nombre }}</p>
    <div class="panel-block">
      <div class="columns">
        <div class="column is-12">
          <div class="field">
            <label class="label">Tipo de documento</label>
            <input class="input" value="{{ $beneficiario->tipo_documento->descripcion }}" disabled>
          </div>
          <div class="field">
            <label class="label">Número de documento</label>
            <input class="input" value="{{ $beneficiario->documento }}" disabled>
          </div>
          <div class="field">
            <label class="label">Dirección</label>
            <input class="input" value="{{ $beneficiario->direccion }}" disabled>
          </div>
          <div class="field">
            <label class="label">Teléfono</label>
            <input class="input" value="{{ $beneficiario->telefono }}" disabled>
          </div>
          <div class="field">
            <label class="label">Clasificación</label>
            <input class="input" value="{{ $beneficiario->clasificacion }}" disabled>
          </div>
          <div class="field">
            <label class="label">Estado</label>
            <input class="input" value="{{ $beneficiario->estado }}" disabled>
          </div>
        </div>
      </div>
    </div>    
    <div class="panel-block">
      <a class="button is-medium is-link is-outlined" href="{{ url('/beneficiarios/'. $beneficiario->id_beneficiario .'/editar') }}">Editar</a>
      <a class="button is-medium is-link is-outlined align-left" href=" {{ url('beneficiarios') }}">Volver</a>
    </div>     
  </div>
</div>
@endsection