<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Sukanta') }}</title>
  <link rel="icon" href="{{ asset('img/favicon.png') }}" sizes="32x32" type="image/png">
  <link rel="icon" href="{{ asset('img/favicon.png') }}" sizes="16x16" type="image/png">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/fa5/css/all.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Share+Tech+Mono" rel="stylesheet">
  <link href="{{ asset('css/site.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    @include('site.inc.header')
    <div class="body-container" style="min-height: 500px;">
      @yield('content')
    </div>
    @include('site.inc.footer')
  </div>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/site_custom.js') }}" defer></script>
</body>
</html>
