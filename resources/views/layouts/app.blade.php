<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <title>Just An Affordable WebShop</title>
    <link rel="icon" type="image/png" href="images/customisations/logo3.ico"/>
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