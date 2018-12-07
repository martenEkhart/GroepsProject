
@extends('layouts.app')
@section('categories')


@if(count($categories)) 
@foreach($categories as $category)
<a href="/category/{{$category->id}}">
<div class="container">
    
<h1>{{$category->name}}</h1>

</a>  

<div>
  
</div>  

    
</div>
@endforeach
@endif
@endsection