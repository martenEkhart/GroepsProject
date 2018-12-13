<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="/css/app.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Just An Affordable WebShop</title>
</head>
<body>
    <div id='app'></div>
     @include('inc.navbar')
        @include('inc.messages')
        <div class="container"> 
        @yield('content')
        </div>  
   <script src="{{ asset('js/app.js') }}" defer></script>
    @include('inc.footer')
</div> 
</body>
</html>