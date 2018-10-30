@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Registrar ayuda</p>
    <div class="panel-block">
      <form class="long-form" action="{{ url('ayudas') }}" method="post">
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

        <div class="columns">
          <div class="column is-one-third">
            <div class="field">
              <label for="nombre" class="label">Fecha de entrega</label>
              <input type="date" name="fecha_ayuda" id="calendarioayudas" class="input {{ $errors->has('fecha_ayuda') ? ' is-danger' : '' }}" value="{{ old('fecha_ayuda') }}" placeholder="Ingrese la fecha de entrega" autofocus>
              @if ($errors->has('fecha_ayuda'))
                <p class="help is-danger">{{ $errors->first('fecha_ayuda') }}</p>
              @endif
            </div>
          </div>
          <div class="column">
            <div class="field">
              <label for="nombre" class="label">Tipo de ayuda</label>
              <select-generico :old="'{{old('id_tipoayuda')}}'" :propname="'id_tipoayuda'" :url="'/ayudas/obtenertiposayudas'" :class_id="'select {{ $errors->has('id_tipoayuda') ? ' is-danger' : '' }}'"></select-generico>
              @if ($errors->has('id_tipoayuda'))
                <p class="help is-danger">{{ $errors->first('id_tipoayuda') }}</p>
              @endif
            </div> 
          </div>
          <div class="column">
            <div class="field">
              <label for="nombre" class="label">Beneficiario</label>
              <select-generico :old="'{{old('id_beneficiario')}}'" :value_id="'selectBeneficiario'" :propname="'id_beneficiario'" :url="'/beneficiarios/obtenerlistadobeneficiarios'" :class_id="'select {{ $errors->has('id_beneficiario') ? ' is-danger' : '' }}'"></select-generico>
              @if ($errors->has('id_beneficiario'))
                <p class="help is-danger">{{ $errors->first('id_beneficiario') }}</p>
              @endif
            </div>            
          </div>
          <div class="column">
            <div class="field">
              <label for="nombre" class="label">Iglesia</label>
              <select-generico :old="'{{old('id_iglesia')}}'" :propname="'id_iglesia'" :url="'/iglesias/obtenerlistadoiglesias'" :class_id="'select {{ $errors->has('id_iglesia') ? ' is-danger' : '' }}'"></select-generico>
              @if ($errors->has('id_iglesia'))
                <p class="help is-danger">{{ $errors->first('id_iglesia') }}</p>
              @endif
            </div>
          </div>
        </div> 
        
        <div class="field">
          <label class="label">Observaciones</label>
          <div class="control">
            <textarea class="textarea" placeholder="Observaciones adicionales" name="observaciones" value="{{ old('observaciones') }}"></textarea>
            
          </div>
        </div>
        
        <hr>
        
        <button type="submit" class="button is-link is-medium is-outlined">Guardar</button>

        <a href="{{ url('ayudas') }}" class="button is-medium is-link is-outlined">Salir</a>
      </form>      
    </div>   
  </div>
</div>  
@endsection