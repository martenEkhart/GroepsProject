<!DOCTYPE html>
<html lang="en">
<head>
        <link rel="stylesheet"  href="/css/app.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        @include('inc.navbar')
   <h1 style="text-align:center">Admin Page</h1> 
   <div class="container" style="margin-top: 10px;" >
   <div class="row">
       <ul  class="list-group">
            <li class="list-group-item active"><h2 style="text-align:center">Categories</h2></li>   
        <li class="list-group-item"><a href="/category" class="btn btn-outline-primary"><h4>Show-Categories</h4></a></li>
        <li class="list-group-item"><a href="/category/create" class="btn btn-outline-primary"><h4>Create-Category</h4></a></li>
       </ul>
       <div class="row" style="margin-left:4px;">
            <ul  class="list-group">
                 <li class="list-group-item active"><h2 style="text-align:center">Products</h2></li>   
             <li class="list-group-item"><a href="/product" class="btn btn-outline-primary"><h4>Show-Products</h4></a></li>
             <li class="list-group-item"><a href="/product/create" class="btn btn-outline-primary"><h4>Create-Product</h4></a></li>
            </ul>
     </div>
</div>
   </div> 
    
     @yield('content')
        </div> 
   <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>