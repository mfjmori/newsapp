<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Trend × Tech</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    @if (env('APP_ENV')=='local')
    <script src="{{ asset('js/app.js') }}" defer></script>
    @elseif(env('APP_ENV')=='production')
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    @endif
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    @if (env('APP_ENV')=='local')
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @elseif(env('APP_ENV')=='production')
      <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    @endif
</head>
<body>
  @header
  @endheader
  @sub_header
  @endsub_header
  <main>
    @yield('content')
  </main>
</body>
</html>
