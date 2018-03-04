@extends('layouts.app')

@section('title', 'Una botiga > M7 DAW')

@section('content')
  <div class="container my-5">
    <div class="row">
      <div class="col">
        <h1 class="display-4">La botiga</h1>
      </div><!-- /.row -->
    </div><!-- /.row -->

    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h1>Informació</h1>
            <div class="alert alert-primary" role="alert">
              Aqest projecte és una activitat del Cicle Formatiu de Grau Superior de <em>Desenvolupament d'Aplicacions Multiplataforma</em>, Institut Montsià.
              <ul>
                <li>El primer usuari que es registra en la BD obté el rol "administrador".</li>
                <li>
                  <strong>Rols</strong>:<br>
                  - Administrador (admin).<br>
                  - Treballador (worker).<br>
                  - Client (client).
                </li>
              </ul>
            </div>
          </div>
        </div><!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container -->
@endsection
