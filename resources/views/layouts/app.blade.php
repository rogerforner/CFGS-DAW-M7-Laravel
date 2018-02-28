<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>{{ config('app.name') }} | @yield('title')</title>
  </head>
  <body>
    @section('navbar')
        This is the master sidebar.
    @show

    <main>
      @yield('content')
    </main>

    <!-- JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
