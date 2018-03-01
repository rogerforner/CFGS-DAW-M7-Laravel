@extends('layouts.app')

@section('title', 'Dades del producte')

@section('content')
  <div class="container my-5">
    <div class="row">
      <div class="col">
        <h1 class="display-4">Dades del producte</h1>
      </div><!-- /.row -->
    </div><!-- /.row -->

    <div class="row">
      <div class="col">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="lead text-success"><strong>{{ $product->price }} €</strong></p>
            <p class="card-text">{{ $product->description }}</p>

            {{-- Eliminar --}}
            <form class="my-0 mx-0" action="{{ route('products.destroy', $product) }}" method="POST">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger btn-sm">Eliminar producte</button>
            </form>
          </div>
          <div class="card-footer text-muted">
            Última actualització<br>
            <i class="far fa-clock"></i> {{ $product->updated_at }}
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
