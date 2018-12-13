@extends('layouts.app')

@section('content')
<div class="row" style="margin-top: 20px;">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Shoppingcard</h3></div>
                <div class="panel-body">
                   @csrf
                   @if(Auth::guest())
                   @php $user_id = "0"; @endphp
                   @else
                   @php $user_id = Auth::user()->id; @endphp
                   @endif
                    @if(count($cart_items))

                        <ul class="list-group">
                         @foreach($cart_items as $cart_item)
                        
                        <li class="list-group-item"><a href="/product/{{$zegeenswat[$loop->index]->product_id}}"><h4>{{$cart_item->name}}</h4></a>
                        Amount:<input type="number" name="amount" min="1" value="{{ $zegeenswat[$loop->index]->amount}}"  onchange="loadDoc('POST' ,'{{$zegeenswat[$loop->index]->id}}', 'getAmount', '{{$loop->index}}');"></p>                     
                        
                        {!!Form::open(['action' => ['CartsController@removeFromCart', $zegeenswat[$loop->index]->id], 'method' => 'GET'])!!}
                        {{Form::submit('Remove from shoppingcart', ['class' => 'btn btn-danger btn-lg'])}}
                        {!!Form::close()!!}
                        </li>
                        
                        @endforeach
                        <a href="empty/ {{$zegeenswat[0]->cart_id}} ">Empty your shopping cart</a><br>
                        <a href="cart/checkout/{{$user_id}}/{{$zegeenswat[0]->cart_id}} "><b>Finish order</b></a>
                    </ul>
                
                @else
                  <p>Your shopping cart is empty, <a href="products/">Start your shopping spree!</a></p>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
    function loadDoc(method, id, myFunction, ct) {


    var amount = document.getElementsByName("amount")[ct].value;
    var url = "/cart/changeamount/" + id + "/" + amount;

    if (window.XMLHttpRequest) {
        var xhttp = new XMLHttpRequest();
    } else {
        var xhttp = new ActiveXObject();
    }
    // Perform when ajax succesfully finished
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myFunction(this, ct);
        }                    
    }
    xhttp.open(method, url, true);
    if (method == 'POST') {
        var data = document.getElementsByName("amount")[ct].value;
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.setRequestHeader("X-CSRF-TOKEN", document.querySelector("meta[name='csrf-token']").getAttribute("content"));
        xhttp.send(data);
    } else {
        xhttp.send();
    }
}
    function getAmount(xhttp, ct) {
        document.getElementsByName("amount")[ct].value;
}
</script>
@endsection