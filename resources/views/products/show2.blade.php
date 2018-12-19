@extends('layouts.app')
@section('content')

<style>
    #container {
      /* We need to limit the height and show a scrollbar */
      /* width: 800px;
      height: 300px; */
      overflow: auto;
    }
    
</style>



<div class="container">
    <div class="col-md 6" style="margin-top: 20px;">
      <form action="/search" method="get">
        <div class="row">
              <span class="form-group-btn">
                      <button type="submit" class="btn btn-primary" style="width:110px;"><b>Search</b></button>
                  </span>
            <input required type="search" name="search" class="form-control" placeholder="Search Products" style="width: 70%;">
            
        </div>
      </form>
    </div>


    <div id="products-container">



    </div>




</div>

<script>

    var listElm = document.querySelector('#products-container');
    // to get the search term...
    var query = window.location.search.substring(1);
    console.log(query);
    var qs = parse_query_string(query);
    var search = qs.search;
    var newQs = search.replace(/\+/g, " ");

    var startIndex = 0;
    var amount = 1;
    var hasResponseData = true;

    window.onscroll = function (e) {  
        console.log("Scrolllingg");
        if(hasResponseData) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                console.log("Scrolllingg");
                getData(startIndex, amount, newQs);
                startIndex += amount;
            }
      }
    }

    function getData(startIndex, amount, search) 
    {
        console.log(startIndex);
        console.log(amount);

        var htmlContent = "";

        fetch('/willem/' + startIndex + '/' + amount + '/' + search, {
            method: 'get',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        .then(response => response.json())
        .then(function(myJson) {
            console.log(JSON.stringify(myJson));
            console.log(myJson);
            
            if(myJson.length > 0 ) {
                console.log("something");
                for(var i = 0; i< myJson.length; i++) {
                    htmlContent += productHtml(myJson[i]);
                }
            } else {
                hasResponseData = false;
            }
            listElm.innerHTML += htmlContent; 

        });
    }

    function productHtml(product)
    {
        var htmlContent = '<a id="link" href="/product/'+ product.id;
        htmlContent += '"><h1 style="margin-top: 30px;">' + product.name;
        htmlContent += '</h1><img style="max-width:120px;" src="/images/products/' + product.image_name;
        htmlContent += '" class="img-fluid img-thumbnail"><br><br><b> Price: €</b>' + product.price;
        htmlContent += '-,<br><b>Product description:</b> '  + product.description; 
        htmlContent += '<br><small><b>Products in stock:</b>  '  + product.stock;
        htmlContent += ' <br><b>Product Added:</b>  ' + product.created_at;
        htmlContent += ' </small> </a><hr>';
        return htmlContent;
    }
    
 

    function parse_query_string(query) {
        var vars = query.split("&");
        var query_string = {};
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            var key = decodeURIComponent(pair[0]);
            var value = decodeURIComponent(pair[1]);
            // If first entry with this name
            if (typeof query_string[key] === "undefined") {
            query_string[key] = decodeURIComponent(value);
            // If second entry with this name
            } else if (typeof query_string[key] === "string") {
            var arr = [query_string[key], decodeURIComponent(value)];
            query_string[key] = arr;
            // If third or later entry with this name
            } else {
            query_string[key].push(decodeURIComponent(value));
            }
        }
        return query_string;
        }



    // Initially load some items.
    getData(startIndex, amount, newQs);
    startIndex++;


    
</script>

@endsection
