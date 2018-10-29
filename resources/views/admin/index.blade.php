@extends('layouts.main')

@section('content')
  <div class="column is-12">
    <section class="hero is-info welcome is-small">
      <div class="hero-body">
        <div class="container">
          <h1 class="title">
            Bienvenido, {{ Auth::user()->name }}.
          </h1>
          <h2 class="subtitle">
            Te has logeado como {{ Auth::user()->roles[0]->description }}
          </h2>
        </div>
      </div>
    </section>
    <section class="info-tiles">
      <div class="tile is-ancestor has-text-centered">
        <div class="tile is-parent">
          <article class="tile is-child box">
            <p class="title">439k</p>
            <p class="subtitle">Ayudas</p>
          </article>
        </div>
        <tiles-generico :url="'/usuarios/obtenerlistadoparrocos'" :datainfo="'Parrocos'"></tiles-generico>
        <tiles-generico :url="'/iglesias/obtenerlistadoiglesias'" :datainfo="'Iglesias'"></tiles-generico>
        <tiles-generico :url="'/beneficiarios/obtenerlistadobeneficiarios'" :datainfo="'Beneficiarios'"></tiles-generico>
      </div>
    </section>
  </div>
@endsection