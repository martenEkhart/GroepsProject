@extends('layouts.app')

@section('content')
<div class="row" style="margin-top: 20px;">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Your shopping cart</h3></div>
                <div class="panel-body">
                   @csrf
                   @if(Auth::guest())
                   @php $user_id = "0"; @endphp
                   @else
                   @php $user_id = Auth::user()->id; @endphp
                   @endif
                    @if(count($cart_items))

                        <ul class="list-group">
                         @foreach($cart->cart_product as $cart_item)
                         <div class="for-wrapper">
                        <li class="list-group-item"><a href="/product/{{$cart_item->product_id}}"><h4>{{$cart_item->product->name}}</h4></a>
                        Amount:<input type="number" id="amount{{$cart_item->id}}" min="1" value="{{ $cart_item->amount}}"  onchange="loadDoc('POST' ,'{{$cart_item->id}}', 'getAmount');"></p>                     
                        
                        {{-- {!!Form::open(['action' => ['CartsController@removeFromCart', $zegeenswat[$loop->index]->id], 'method' => 'GET'])!!}
                        {{Form::submit('Remove from shoppingcart', ['class' => 'btn btn-danger btn-lg'])}}
                        {!!Form::close()!!} --}}
                        <button onclick="deleteData({{$zegeenswat[$loop->index]->id}}, {{$loop->index}})">Remove from your cart</button>
                        </li>
                    </div>
                        @endforeach
                        <a href="empty/ {{$zegeenswat[0]->cart_id}}" class="empty_cart">Empty your shopping cart</a><br>
                    </ul>
                    <h3 id="price">Total price = €{{$cart->getTotal()}}</h3>
                    <br><br>
                    <div class="container">
                        <h3>Please select your address</h3>
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-default">
                                {{-- <div class="panel-heading"><a href="/" class="pull-right btn btn-default btn-xs">Go Back</a></div> --}}
                    
                                @if(count($addresses))
                    
                                @foreach ($addresses as $address)
                                {!! Form::open(['action' => ['CartsController@checkoutCart'], 'method' => 'POST']) !!}
                                
                                <div class="panel-body" style="margin-top: 20px;">
                                  <ul class="card" style="max-width: 250px;">
                                    
                                    
                                    <li style="list-style: none;"><h5> {{$address->street}}</h5></li>
                                    <li style="list-style: none;"><h5> {{$address->house_number}}</h5></li>
                                    <li style="list-style: none;"><h5> {{$address->city}}</h5></li>
                                    <li style="list-style: none;"><h5> {{$address->zipcode}}</h5></li>
                                    <li style="list-style: none;"><h5> {{$address->country}}</h5></li>
                                    <li style="list-style: none;" ><h5> {{$address->phone_number}}</h5></li>
                                   
                                    </ul>
                                    {{ Form::checkbox('address', $address->id, null, null, array('id'=>'address')) }}
                                        
                                   
                                
                                </div>
                                
                                <a href="/address/create">Add a new address</a>

                                @endforeach
                                <br><br>

                                {{Form::submit('Finalize order', ['class'=>'btn btn-primary'])}}
                                {!!Form::close()!!}
                            </div>
                        </div>
                    </div>

                     @else
                     <a href="/address/create">Add a new address</a>
                    @endif

                @else
                  <p>Your shopping cart is empty, <a href="../product/">Start your shopping spree!</a></p>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="container" style="height: 150px;"></div>
<script>
    function loadDoc(method, id, myFunction) {

    var amount = document.getElementById("amount" + id).value;
    console.log(amount);
    var url = "/cart/changeamount/" + id + "/" + amount;
   

    if (window.XMLHttpRequest) {
        var xhttp = new XMLHttpRequest();
    } else {
        var xhttp = new ActiveXObject();
    }
    // Perform when ajax succesfully finished
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var price = JSON.parse(xhttp.responseText);
            console.log(price);
            document.getElementById("price").innerHTML = "Total price: €" + price;
        }                    
    }
    xhttp.open(method, url, true);
    if (method == 'POST') {
        var data = document.getElementsByName("amount"+id).value;
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

function deleteData(item, indexToRemove) {
        return fetch('/cart/' + item, {
            method: 'delete',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        .then(response => response.json())
       
        .then(function(myJson) {
            // console.log(JSON.stringify(myJson));
            console.log(myJson);
            // console.log(myJson[0].id);
            if(myJson[0].id == item){
                var price = myJson[1];
                console.log(price);
                document.getElementById("price").innerHTML = "Total price: €" + price;

                var forDiv = document.getElementsByClassName("for-wrapper");
                if(forDiv.length <= 1 ) {
                    document.getElementsByClassName("empty_cart").innerHTML = "";
                }   
                document.getElementsByClassName("for-wrapper")[indexToRemove].innerHTML = "";
            }
        });
        }




</script>
@endsection