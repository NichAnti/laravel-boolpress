<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}" charset="utf-8"></script>

        <title>Blog</title>
    </head>
    <body>
      <div class="container">

        <a href="{{ route('posts.index') }}">
          <h1>My Blog</h1>
        </a>

        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
        @if (session('success'))
          <div class="alert alert-success">
            <div class="container">
              {{ session('success') }}
            </div>
          </div>
        @endif

        @yield('content')

      </div>
    </body>
</html>
