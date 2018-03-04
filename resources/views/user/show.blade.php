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

            {{-- Eliminar --}}
            <form class="my-0 mx-0" action="{{ route('user.destroy', $user) }}" method="POST">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger btn-sm">Eliminar compte</button>
            </form>
          </div>
          <div class="card-footer text-muted">
            Última actualització<br>
            <i class="far fa-clock"></i> {{ $user->updated_at }}
          </div>
        </div><!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container -->
@endsection
