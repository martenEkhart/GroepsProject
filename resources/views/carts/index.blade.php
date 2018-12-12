@extends('layouts.app')

@section('content')
<div class="row" style="margin-top: 20px;">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Winkelwagentje</h3></div>
                <div class="panel-body">
                        @csrf
                    @if(count($cart_items))

                        <ul class="list-group">
                         @foreach($cart_items as $cart_item)
                        
                        <li class="list-group-item"><a href="/cart_item/{{$cart_item->id}}"><h4>{{$cart_item->name}}</h4></a><p> in Stock: {{$cart_item->stock}}</p>
                        {{-- {{ Form::number('Aantal',  $zegeenswat[$loop->index]->amount , ['Class' => 'form-control', 'placeholder' => 'Amount', 'onClick' => 'alert(123)']) }}                         --}}
                        {!!Form::open(['action' => ['CartsController@removeFromCart', $zegeenswat[$loop->index]->id], 'method' => 'GET', 'class' => 'float-right'])!!}
                        {{-- {{Form::hidden('_method','DELETE')}} --}}
                        {{-- {{ Form::number('amount',  $zegeenswat[$loop->index]->amount , ['Class' => 'form-control', 'placeholder' => 'Amount', 'onClick' => 'loadDoc("POST" , "/cart/"'.$zegeenswat[$loop->index]->id."'", getAmount, "tixt",  "name")]') }}    --}}
                        <input type="number" name="amount" value="{{ $zegeenswat[$loop->index]->amount}}" class="form-control" onclick="loadDoc('POST' ,'/cart/changeamount/{{$zegeenswat[$loop->index]->id}}/{{$zegeenswat[$loop->index]->amount}}', 'getAmount', '{{$loop->index}}');">                     
                        {!!Form::open(['action' => ['CartsController@removeFromCart', $zegeenswat[$loop->index]->id], 'method' => 'GET', 'class' => 'float-right'])!!}

                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-lg'])}}
                        {!!Form::close()!!}
                        </li>
                        @endforeach
                    </ul>
                @else
                  <p>Your shopping cart is empty. <a href="cart_items/">Start your shopping spree!</a></p>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
    function loadDoc(method, url, myFunction, ct) {
        
        // alert (document.getElementsByName("amount")[ct].value);
    if (window.XMLHttpRequest) {
        var xhttp = new XMLHttpRequest();
    } else {
        var xhttp = new ActiveXObject();
    }
    // Perform when ajax succesfully finished
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert ("etetete");
            myFunction(this, ct);
        }                    
    }
    xhttp.open(method, url, true);
    if (method == 'POST') {
       
        var data = document.getElementsByName("amount")[ct].value;
       
        alert (data);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.setRequestHeader("X-CSRF-TOKEN", document.querySelector("meta[name='csrf-token']").getAttribute("content"));
       
        xhttp.send(data);
        
    } else {
        xhttp.send();
    }
}
    function getAmount(xhttp, ct) {
        alert("reeeeeeeeeeeee");
        document.getElementsByName("amount")[ct].value;
}
</script>
@endsection