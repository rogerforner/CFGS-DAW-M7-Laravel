@extends('layouts.app')

@section('title', 'Usuaris')

@section('content')
  <div class="container my-5">
    <div class="row">
      <div class="col">
        <h1 class="display-4">Usuaris</h1>
      </div><!-- /.row -->
    </div><!-- /.row -->

    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <!-- TAULA USUARIS
            -------------------->
            <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Correu electrònic</th>
                <th scope="col">Professió</th>
                <th scope="col">Accions</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($users as $user)
                <tr>
                  <td class="align-middle">{{ $user->id }}</td>
                  <td class="align-middle">{{ $user->name }}</td>
                  <td class="align-middle">{{ $user->email }}</td>
                  <td class="align-middle">{{ $user->profession }}</td>
                  <td class="align-middle">
                    <div class="btn-group" role="group" aria-label="Accions">
                      <a href="{{ action('UserController@show', ['id' => $user->id]) }}" class="btn btn-dark btn-sm" role="button" aria-pressed="true">Visualitzar</a>
                      <a href="#" class="btn btn-warning btn-sm" role="button" aria-pressed="true">Editar</a>
                      <a href="#" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Eliminar</a>
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5">No hi ha productes a la base de dades.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
          </div>
        </div><!-- /.card -->
      </div><!-- /.row -->
    </div><!-- /.row -->
  </div><!-- /.container -->
@endsection
