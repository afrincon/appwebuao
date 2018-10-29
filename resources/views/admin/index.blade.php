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
  </div>
@endsection