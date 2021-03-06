<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Blog</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" defer></script>
</head>
<body>

  @include('navbar')

   <div class="container">
       @if (Session::has('flash_message'))
           <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
       @endif

       @yield('content')
   </div>
</body>
</html>
