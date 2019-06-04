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

        <header class="py-3">
          <div class="row align-items-center">
            <div class="col">
              @guest
                  <div class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </div>
                  @if (Route::has('register'))
                      <div class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </div>
                  @endif
              @else
                  <div class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                          <a class="dropdown-item" href="{{ route('mail-page') }}">Contact the admin</a>
                      </div>
                  </div>
              @endguest
            </div>
            <div class="col text-center">
              <a class="text-dark" href="{{ route('home') }}">
                <h1>My Blog</h1>
              </a>
            </div>
            <div class="col text-right">
              <a class="btn btn-outline-dark" href="{{ route('search-post') }}">search post</a>
            </div>
          </div>
        </header>


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

        <footer class="mt-5"></footer>

      </div>
    </body>
</html>
