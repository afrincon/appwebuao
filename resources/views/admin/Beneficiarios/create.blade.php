@extends('layouts.main')

@section('content')
<div class="column is-12">
  <div class="panel">
    <p class="panel-heading">Creación de Beneficiario</p>
    <div class="panel-block">
      <form class="long-form" action="{{ url('beneficiarios') }}" method="post">
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
          <div class="column is-half"> 
            <div class="field">
              <label for="nombre" class="label">Nombre</label>
              <input type="text" name="nombre" class="input {{ $errors->has('nombre') ? ' is-danger' : '' }}" value="{{ old('nombre') }}" placeholder="Ingrese el nombre del beneficiario">
              @if ($errors->has('nombre'))
                <p class="help is-danger">{{ $errors->first('nombre') }}</p>
              @endif
            </div>     
          </div>
          <div class="column"> 
            <div class="field">
              <label class="label">Tipo de documento</label>
              <select-generico :old="'{{ old('id_tipo_documento') }}'" :propname="'id_tipo_documento'" :url="'/beneficiarios/obtenerlistadotiposdoc'" :class="'select {{ $errors->has('id_tipo_documento') ? ' is-danger' : '' }}'"></select-generico>
              @if ($errors->has('id_tipo_documento'))
                <p class="help is-danger">{{ $errors->first('id_tipo_documento') }}</p>
              @endif
            </div>       
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Documento</label>
              <input type="text" name="documento" class="input {{ $errors->has('documento') ? ' is-danger' : '' }}" value="{{ old('documento') }}" placeholder="Ingrese el número de documento">
              @if ($errors->has('documento'))
                <p class="help is-danger">{{ $errors->first('documento') }}</p>
              @endif
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label">Dirección</label>
          <input type="text" name="direccion" id="direccionBeneficiario" class="input {{ $errors->has('direccion') ? ' is-danger' : '' }}" value="{{ old('direccion') }}" disabled>
          @if ($errors->has('direccion'))
            <p class="help is-danger">{{ $errors->first('direccion') }}</p>
          @endif
        </div>

        <div class="columns">          
          <div class="column">            
            <div class="columns is-mobile">
              <div class="column">                  
                <div class="select">
                  <select id="step1">
                    <option selected disabled>Selecionar</option>
                    <option>Avenida</option>
                    <option>Calle</option>
                    <option>Carrera</option>
                    <option>Diagonal</option>
                    <option>Transversal</option>
                  </select>
                </div>
              </div>
              <div class="column">                
                <input class="input" type="text" placeholder="Número" id="step2">
              </div>
              <div class="column">
                <input class="input" type="text" placeholder="Número" id="step3">
              </div>
              <div class="column">
                <input class="input" type="text" placeholder="Número" id="step4">
              </div>
            </div>
          </div>
          <div class="column">            
            <div class="columns is-mobile">              
              <div class="column">
                  <input class="input" type="text" placeholder="Información adicional" id="step5">
              </div>              
              <div class="column">
                  <a class="button is-primary" id="confirmarDireccion">Confirmar dirección</a>
              </div>             
            </div>
          </div>
        </div>
        

        <div class="columns">
          <div class="column is-two-fifths"> 
            <div class="field">
              <label class="label">Teléfono</label>
              <input type="text" name="telefono" class="input {{ $errors->has('telefono') ? ' is-danger' : '' }}" value="{{ old('telefono') }}" placeholder="Ingrese el teléfono de la iglesia">
              @if ($errors->has('telefono'))
                <p class="help is-danger">{{ $errors->first('telefono') }}</p>
              @endif
            </div>          
          </div>
          <div class="column">
            <div class="field">
              <label class="label">Clasificación</label>
              <div class="select {{ $errors->has('clasificacion') ? ' is-danger' : '' }}">
                <select name="clasificacion">
                  <option selected>Seleccione una opcion</option>
                  <option value="Vulnerable N-1">Vulnerable N-1</option>
                  <option value="Vulnerable N-2">Vulnerable N-2</option>
                  <option value="Vulnerable N-3">Vulnerable N-3</option>
                </select>
                @if ($errors->has('clasificacion'))
                  <p class="help is-danger">{{ $errors->first('clasificacion') }}</p>
                @endif
              </div>
            </div>          
          </div>
        </div>
        <input type="hidden" name="estado" value="1">
        <hr>
        
        <button type="submit" class="button is-link is-medium is-outlined" id="btnBeneficiario">Guardar</button>

        <a href="{{ url('beneficiarios') }}" class="button is-medium is-link is-outlined">Salir</a>
      </form>      
    </div>   
  </div>
</div>
@endsection