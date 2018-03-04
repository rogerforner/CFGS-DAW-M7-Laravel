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
            <!-- PDF
            -------------------->
            <a class="btn btn-outline-danger" href="{{ url('users/pdf/name-asc') }}"
              role="button"><i class="far fa-file-pdf"></i> Nom (Asc.)</a>
            <a class="btn btn-outline-danger" href="{{ url('users/pdf/name-desc') }}"
              role="button"><i class="far fa-file-pdf"></i> Nom (Desc.)</a>
            <a class="btn btn-outline-danger" href="{{ url('users/pdf/id-asc') }}"
              role="button"><i class="far fa-file-pdf"></i> ID (Asc.)</a>
            <a class="btn btn-outline-danger" href="{{ url('users/pdf/id-desc') }}"
              role="button"><i class="far fa-file-pdf"></i> ID (Desc.)</a>
            <a class="btn btn-outline-danger" href="{{ url('users/pdf/updated-g-asc') }}"
              role="button"><i class="far fa-file-pdf"></i> Data Act. (Grup|Asc.)</a>
            <a class="btn btn-outline-danger" href="{{ url('users/pdf/updated-g-desc') }}"
              role="button"><i class="far fa-file-pdf"></i> Data Act. (Grup|Desc.)</a>

            <!-- TAULA USUARIS
            -------------------->
            <table class="table table-hover mt-4">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Correu electrònic</th>
                <th scope="col">Creat</th>
                <th scope="col">Modificat</th>
                <th scope="col">Accions</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($users as $user)
                <tr>
                  <td class="align-middle">{{ $user->id }}</td>
                  <td class="align-middle">{{ $user->name }}</td>
                  <td class="align-middle">{{ $user->email }}</td>
                  <td class="align-middle">{{ $user->created_at }}</td>
                  <td class="align-middle">{{ $user->updated_at }}</td>
                  <td class="align-middle">
                    <div class="btn-group" role="group" aria-label="Accions">
                      {{-- Veure --}}
                      <a class="btn btn-dark btn-sm" href="{{ route('users.show', $user) }}" role="button">Veure</a>
                      {{-- Editar --}}
                      <a class="btn btn-warning btn-sm" href="{{ route('users.edit', $user) }}" role="button">Editar</a>
                      {{-- Eliminar --}}
                      <form class="my-0 mx-0" action="{{ route('users.destroy', $user) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                      </form>
                    </div><!-- /.btn-group -->
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="4">No hi ha usuaris a la base de dades.</td>
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
