<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="/css/app.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>JAAW</title>

</head>
<body>
    @include('inc.navbar')

   
    <div class="container" style="margin-top: 10px;" >
         @if(Request::is('/'))   
         @include('inc.showcase')
         @endif
         
         <div class="row">
          
    
           <div class="col-md-8 col-lg-8" style="padding-top: 10px;"> 
                    @yield('content')
    </div>        
        </div> 
            </div> 

            <footer id="footer" class="text-center" style= "margin-top: 45%;" >
                <p><b>Copyright 2018 &copy; JAAW</b></p>
            </footer>          
    <script src="{{ asset('js/app.js') }}" defer></script>
    

</body>
</html>