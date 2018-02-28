@extends('layouts.app')

@section('title', 'Dades de l\'usuari')

@section('content')
  <div class="container my-5">
    <div class="row">
      <div class="col">
        <h1 class="display-4">Dades de l'usuari</h1>
      </div><!-- /.row -->
    </div><!-- /.row -->

    <div class="row">
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="https://source.unsplash.com/featured/?person" alt="{{ $user->name }}">
          <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">{{ $user->email }}</p>
            <a href="#" class="btn btn-danger"><i class="fas fa-user-times"></i> Baixa</a>
          </div>
          <div class="card-footer text-muted">
            Última actualització<br>
            <i class="far fa-clock"></i> {{ $user->updated_at }}
          </div>
        </div><!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row mt-5">
      <div class="col">
        <a href="{{ action('UserController@index') }}"><i class="far fa-arrow-alt-circle-left"></i> Tornar</a>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container -->
@endsection
