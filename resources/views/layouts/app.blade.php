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
    <div id='app'></div>

    @include('inc.navbar')
  
        @include('inc.messages')
        <div class="container"> 
            
    
        @if(Request::is('/')) 
        @include('inc.header') 
    @include('inc.searchbar')
    @endif
   
    
   <div class="container" style="margin-top: 40px;">
         @if(Request::is('/'))   
         @include('inc.carousel')
         @endif
        </div>
         <div class="row">
          
    
           <div class="col-md-8 col-lg-8"> 
                    @yield('content')
    </div>        
        </div> 
            </div> 
            @if(Request::is('/'))   
            @include('inc.showcase')
            @endif

         @yield('categories')
         
              
    <script src="{{ asset('js/app.js') }}" defer></script>
       
    @include('inc.footer')
</div> 
</body>
</html>