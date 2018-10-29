@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Registro de ayudas</p>
    <div class="panel-block">
        <a href="{{ url('/ayudas/crear') }}" class="button is-medium is-link is-rounded is-outlined">Registrar ayuda</a>
    </div>
    @if (session('status'))
    <div class="panel-block">
      <div class="notification is-success">
        <button class="delete"></button>
        {{ session('status') }}
      </div>
    </div>      
    @endif
    <div class="panel-block">
      <tabla-ayudas></tabla-ayudas>
    </div>            
      
  </div>
</div>
@endsection