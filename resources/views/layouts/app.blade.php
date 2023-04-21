<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title', 'TsubuYaki')</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <main class="main">
    @yield('content')
  </main>
</body>
</html>