@extends('layouts.app')

@section('title', 'Crear producte')

@section('content')
  <div class="container my-5">
    <div class="row">
      <div class="col">
        <h1 class="display-4">Crear producte</h1>

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
            <form action="{{ action('ProductController@index') }}" method="POST">
              @csrf

              <div class="form-group">
                <label for="productName">Nom <span class="text-danger"><strong>*</strong></span></label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="productName" required>
              </div>

              <div class="form-group">
                <label for="productPrice">Preu <span class="text-danger"><strong>*</strong></span></label>
                <input type="number" name="price" step=".01" value="{{ old('price') }}" class="form-control" id="productPrice" placeholder="€" required>
              </div>

              <div class="form-group">
                <label for="productDescription">Descripció</label>
                <input type="text" name="description" value="{{ old('description') }}" class="form-control" id="productDescription">
              </div>

              <button type="submit" class="btn btn-primary">Crear</button>
            </form>
          </div>
        </div><!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row mt-5">
      <div class="col">
        <a href="{{ action('ProductController@index') }}"><i class="far fa-arrow-alt-circle-left"></i> Tornar</a>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container -->
@endsection
