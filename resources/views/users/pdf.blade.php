@extends('layouts.pdf')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <h1 class="display-4">Llistat d'usuaris</h1>
      </div><!-- /.row -->
    </div><!-- /.row -->

    <div class="row">
      <div class="col">
        <!-- INFO.
        -------------------->
        <p>{{ $info }}</p>

        <!-- TAULA USUARIS
        -------------------->
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
              <th scope="col">Correu electrònic</th>
              <th scope="col">Modificat</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($users as $user)
              <tr>
                <td class="align-middle">{{ $user->id }}</td>
                <td class="align-middle">{{ $user->name }}</td>
                <td class="align-middle">{{ $user->email }}</td>
                <td class="align-middle">{{ $user->updated_at }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="4">No hi ha usuaris a la base de dades.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div><!-- /.row -->
    </div><!-- /.row -->
  </div><!-- /.container -->
@endsection
