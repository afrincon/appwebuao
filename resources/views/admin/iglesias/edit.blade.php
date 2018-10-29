@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Edición de <b>{{ $iglesia->nombre }}</b></p>
    <div class="panel-block">
      <form class="long-form" action="{{ route('iglesias.update', $iglesia->id) }}" method="post">
        @method('put')
        @csrf
        @if(count($errors) > 0)
        <div class="notification is-danger">
            <button class="delete"></button>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="field">
          <label for="nombre" class="label">Nombre</label>
          <input type="text" name="nombre" class="input {{ $errors->has('nombre') ? ' is-danger' : '' }}" value="{{ old('nombre', $iglesia->nombre) }}" placeholder="Ingrese el nombre del parroco">
          @if ($errors->has('nombre'))
            <p class="help is-danger">{{ $errors->first('nombre') }}</p>
          @endif
        </div>
        
        
        <div class="field">
          <label class="label">Dirección</label>
          <input type="text" name="direccion" class="input {{ $errors->has('direccion') ? ' is-danger' : '' }}" value="{{ old('direccion', $iglesia->direccion) }}" placeholder="Ingrese la dirección de residencia">
          @if ($errors->has('direccion'))
            <p class="help is-danger">{{ $errors->first('direccion') }}</p>
          @endif
        </div>
        <div class="columns">
          <div class="column is-two-fifths"> 
            <div class="field">
              <label class="label">Teléfono</label>
              <input type="text" name="telefono" class="input {{ $errors->has('telefono') ? ' is-danger' : '' }}" value="{{ old('telefono', $iglesia->telefono) }}" placeholder="Ingrese el teléfono de la iglesia">
              @if ($errors->has('telefono'))
                <p class="help is-danger">{{ $errors->first('telefono') }}</p>
              @endif
            </div>          
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Diocesis principal</label>
              <select-generico :old="'{{ old('id_arquidiocesis', $iglesia->id_arquidiocesis) }}'" :propname="'id_arquidiocesis'" :url="'/iglesias/obtenerlistadodiocesis'" :class="'select {{ $errors->has('id_arquidiocesis') ? ' is-danger' : '' }}'"></select-generico>
                @if ($errors->has('id_arquidiocesis'))
                  <p class="help is-danger">{{ $errors->first('id_arquidiocesis') }}</p>
                @endif
              </div>
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Parroco</label>
              <select-generico :old="'{{ old('user_id', $iglesia->user_id) }}'" :propname="'user_id'" :url="'/usuarios/obtenerlistadoparrocos'" :class_id="'select {{ $errors->has('user_id') ? ' is-danger' : '' }}'"></select-generico>
              @if ($errors->has('user_id'))
                <p class="help is-danger">{{ $errors->first('user_id') }}</p>
              @endif
            </div>
          </div>
        </div>
        <div class="select">
        <label class="label">Estado</label>
          <select  name="estado">
          <option disabled>Seleccione una opción</option>
            @if($iglesia->estado == 1)
              <option selected value="{{ old('estado', $iglesia->estado) }}">Activo</option>
              <option value="0">Inactivo</option>
            @else
              <option selected value="{{ old('estado', $iglesia->estado) }}">Inactivo</option>
              <option value="1">Activo</option>
            @endif
          </select>
        </div>
        <hr>
        
        <button type="submit" class="button is-link is-medium is-outlined">Guardar</button>

        <a href="{{ url('usuarios') }}" class="button is-medium is-link is-outlined">Salir</a>
      </form>      
    </div>   
  </div>
</div>  
@endsection