<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <!-- アイコン(font awsome)のやつ -->
  <script src="https://kit.fontawesome.com/8e1936080d.js" crossorigin="anonymous"></script>
  {{-- 個別のjavaScript読み込み --}}
  @yield('javascript')

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  {{-- 個別のCSS読み込み --}}
  @yield('css')

  <title>学生会議事録 - @yield('title')</title>
</head>
<body>
  <div id="app">
    <header>
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary"">
        <a class="navbar-brand" href="#">ECC学生会議事録</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        </div>
      </nav>
    </header>

    <main style="margin-top: 80px;">
      @yield('content')
    </main>
  </div>
</body>
<footer>
  <div class="footer_test"></div>
</footer>
</html>