@extends('layouts.app')

@section('title', 'Crear usuari')

@section('content')
  <div class="container my-5">
    <div class="row">
      <div class="col">
        <h1 class="display-4">Crear usuari</h1>

        {{-- Mostrar errors --}}
        @if ($errors->any())
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Compte!</strong> Hi ha errors.

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

      </div><!-- /.row -->
    </div><!-- /.row -->

    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <form action="{{ action('UserController@index') }}" method="POST">
              @csrf

              <div class="form-group">
                <label for="userName">Nom</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="userName">
                @if ($errors->has('name'))
                  <p class="text-danger"><small>El camp no pot estar buit.</small></p>
                @endif
              </div>

              <div class="form-group">
                <label for="userEmail">Correu electrònic</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="userEmail" placeholder="@" required>
              </div>

              <div class="form-group">
                <label for="userPassword">Password</label>
                <input type="password" name="password" class="form-control" id="userPassword" placeholder="***" required>
              </div>

              <button type="submit" class="btn btn-primary">Crear</button>
            </form>
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
