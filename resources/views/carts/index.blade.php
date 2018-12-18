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
                         @foreach($cart_items as $cart_item)
                         <div class="for-wrapper">
                        <li class="list-group-item"><a href="/product/{{$zegeenswat[$loop->index]->product_id}}"><h4>{{$cart_item->name}}</h4></a>
                        Amount:<input type="number" name="amount" min="1" value="{{ $zegeenswat[$loop->index]->amount}}"  onchange="loadDoc('POST' ,'{{$zegeenswat[$loop->index]->id}}', 'getAmount', '{{$loop->index}}');"></p>                     
                        
                        {{-- {!!Form::open(['action' => ['CartsController@removeFromCart', $zegeenswat[$loop->index]->id], 'method' => 'GET'])!!}
                        {{Form::submit('Remove from shoppingcart', ['class' => 'btn btn-danger btn-lg'])}}
                        {!!Form::close()!!} --}}
                        <button onclick="deleteData({{$zegeenswat[$loop->index]->id}}, {{$loop->index}})">Remove from your cart</button>
                        </li>
                    </div>
                        @endforeach
                        <a href="empty/ {{$zegeenswat[0]->cart_id}}" class="empty_cart">Empty your shopping cart</a><br>
                    </ul>
                
                    <div class="row">
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
                                @endforeach
                                @endif
                                {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                                {!!Form::close()!!}
                            </div>
                        </div>
                    </div>

                    {{-- @else
                        <a href="/address/create">Create new Address</a>
<<<<<<< HEAD
                    @endif --}}
                <h1>Total price = ${{$cart->getTotal()}}</h1>
=======
                    @endif
                <h1>Total price = €{{$cart->getTotal()}}</h1>
>>>>>>> 3803f924c9b237dd4b07b9ffa273e36c9bbc833d

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

function deleteData(item, indexToRemove) {
        return fetch('/cart/' + item, {
            method: 'delete',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        .then(response => response.json())
        .then(function(myJson) {
            console.log(JSON.stringify(myJson));
            console.log(myJson);
            if(myJson.id == item){
                var forDiv = document.getElementsByClassName("for-wrapper");
                if(forDiv.length <= 1 ) {
                    document.getElementsByClassName("empty_cart").innerHTML = "";
                }   
                document.getElementsByClassName("for-wrapper")[indexToRemove].innerHTML = "";
            }
        });
        }


    function loadDoc(method, id, myFunction, ct) {
    var amount = document.getElementsByName("amount")[ct].value;
    var url = "/cart/changeamount/" + id + "/" + amount;
    var data = document.getElementsByName("amount")[ct].value;

    var obj = new Object();
    obj.id = id;
    obj.amount = data;
    //convert object to json string
    var string1 = JSON.stringify(obj);

    if (window.XMLHttpRequest) {
        var xhttp = new XMLHttpRequest();
    } else {
        var xhttp = new ActiveXObject();
    }



    xhttp.open(method, url, true);
    console.log(data);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.setRequestHeader("X-CSRF-TOKEN", document.querySelector("meta[name='csrf-token']").getAttribute("content"));
    xhttp.send(string1);


    // Perform when ajax succesfully finished
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // var a = JSON.parse(xhttp.responseText);
            console.log(xhttp.responseText);
            // console.log(Object.keys(a));
            
        }                    
    }
    } 

</script>
@endsection