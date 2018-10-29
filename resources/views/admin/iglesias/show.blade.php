@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Información de {{ $iglesia->nombre }}</p>
    <div class="panel-block">
    <div class="columns">
          <div class="column is-12">
            <div class="field">
              <label class="label">Dirección</label>
              <input class="input" value="{{ $iglesia->direccion }}" disabled>
            </div>
            <div class="field">
              <label class="label">Teléfono</label>
              <input class="input" value="{{ $iglesia->telefono }}" disabled>
            </div>
            <div class="field">
              <label class="label">Diocesis Principal</label>
              <input class="input" value="{{ $iglesia->arquidiocesis->nombre }}" disabled>
            </div>
            <div class="field">
              <label class="label">Parroco</label>
              <input class="input" value="{{ $iglesia->user->name }}" disabled>
            </div> 
            <div class="field">
              <label class="label">Estado</label>
              @if($iglesia->estado)
              <input class="input" value="Activo" disabled>
              @else
              <input class="input" value="Inactivo" disabled>
              @endif
            </div>           
            <div class="field">
              <label class="label">Fecha de creació</label>
              <input class="input" value="{{ $iglesia->created_at }}" disabled>
            </div>
            <div class="field">
              <label class="label">Fecha de ultima modificación</label>
              <input class="input" value="{{ $iglesia->updated_at }}" disabled>
            </div>
          </div>
        </div>
    </div>
    <div class="panel-block">
      <a class="button is-medium is-link is-outlined" href="{{ url('/iglesias/'. $iglesia->id .'/editar') }}">Editar</a>
      <a class="button is-medium is-link is-outlined align-left" href=" {{ url('iglesias') }}">Volver</a>
    </div>  
  </div>
</div>  
@endsection