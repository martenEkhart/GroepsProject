@extends('layouts.app')

@section('content')
<h1>Klant</h1>
@endsection

{{-- <div class="container" style="margin-top: 20px;">
    <form action="/klant" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="q"
                placeholder="Search users"> <span class="input-group-btn">
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </form>
    </div>
    
    <div class="container">
        @if(isset($details))
            <p> The Search results for your query <b> {{ $query }} </b> are :</p>
        <h2>Sample User details</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->name}}</td>
                    {{-- <td>{{$user->email}}</td> --}}
                {{-- </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div> --}} 