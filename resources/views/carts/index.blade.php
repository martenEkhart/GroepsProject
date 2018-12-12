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
                        
                        <li class="list-group-item"><a href="/product/{{$zegeenswat[$loop->index]->product_id}}"><h4>{{$cart_item->name}}</h4></a>
                        Aantal in wagentje:<input type="number" name="amount" min="1" value="{{ $zegeenswat[$loop->index]->amount}}"  onchange="loadDoc('POST' ,'{{$zegeenswat[$loop->index]->id}}', 'getAmount', '{{$loop->index}}');"></p>                     
                        
                        {!!Form::open(['action' => ['CartsController@removeFromCart', $zegeenswat[$loop->index]->id], 'method' => 'GET'])!!}
                        {{Form::submit('Verwijder uit winkelwagentje', ['class' => 'btn btn-danger btn-lg'])}}
                        {!!Form::close()!!}
                        </li>
                        @endforeach
                    </ul>
                <a href="#">Maak je winkelwagentje leeg</a>
                @else
                  <p>Je winkelwagen is leeg!. <a href="products/">Start je shopping spree!</a></p>
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
        alert("reeeeeeeeeeeee");
        document.getElementsByName("amount")[ct].value;
}
</script>
@endsection