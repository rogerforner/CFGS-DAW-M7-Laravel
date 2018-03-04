@extends('layouts.app')

@section('title', 'Editar usuari')

@section('content')
  <div class="container my-5">
    <div class="row">
      <div class="col">
        <h1 class="display-4">Editar usuari</h1>
        <h2 class="text-muted">{{ $user->name }}</h2>

        {{-- Mostrar errors --}}
        @if ($errors->any())
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Compte!</strong> Hi ha errors.

            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>

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
            <form action="{{ action('UserProfileController@show', ['id' => $user->id]) }}" method="POST">
              @method('put')
              @csrf

              <div class="form-group">
                <label for="userName">Nom <span class="text-danger"><strong>*</strong></span></label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" id="userName">
              </div>

              <div class="form-group">
                <label for="userEmail">Correu electrònic <span class="text-danger"><strong>*</strong></span></label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" id="userEmail" placeholder="@" required>
              </div>

              <div class="form-group">
                <label for="userPassword">Password</label>
                <input type="password" name="password" class="form-control" id="userPassword" placeholder="***">
              </div>

              @role('admin')
                <div class="form-group">
                  <label for="userRole">Rol</label>
                  <select class="form-control" id="userRole">
                    <option selected>----</option>
                    <option value="admin">Administrador</option>
                    <option value="worker">Treballador</option>
                  </select>
                </div>
              @endrole

              <button type="submit" class="btn btn-primary">Editar</button>
            </form>
          </div>
        </div><!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container -->
@endsection
