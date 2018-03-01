@extends('layouts.app')

@section('title', 'Editar producte')

@section('content')
  <div class="container my-5">
    <div class="row">
      <div class="col">
        <h1 class="display-4">Editar producte</h1>
        <h2 class="text-muted">{{ $product->name }}</h2>
      </div><!-- /.row -->
    </div><!-- /.row -->

    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <form action="{{ action('ProductController@show', ['id' => $product->id]) }}" method="POST">
              @method('put')
              @csrf

              <div class="form-group">
                <label for="productName">Nom <span class="text-danger"><strong>*</strong></span></label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" id="productName" required>
              </div>

              <div class="form-group">
                <label for="productPrice">Preu <span class="text-danger"><strong>*</strong></span></label>
                <input type="number" name="price" step=".01" value="{{ old('price', $product->price) }}" class="form-control" id="productPrice" placeholder="€" required>
              </div>

              <div class="form-group">
                <label for="productDescription">Descripció</label>
                <input type="text" name="description" value="{{ old('description', $product->description) }}" class="form-control" id="productDescription">
              </div>

              <button type="submit" class="btn btn-primary">Editar</button>
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
