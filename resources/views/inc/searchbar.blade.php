

   <div class="container">
   <div class="col-md 6">
        <form action="/search" method="get">
          <div class="row">
                <span class="form-group-btn">
                        <button type="submit" class="btn btn-primary" style="width:110px;"><b>Search</b></button>
                    </span>
              <input required type="search" name="search" class="form-control" placeholder="Search Products" style="width: 85%;">
              
          </div>
          <div class="custom-select1">
              @if(count($categories) > 0)
              <select name="categorySelect" id="categories-select">
                  <option value="0">All categories</option>
                @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
              @endif
            </div>
        </form>
        
      </div>
   </div>

   <script>

// function onCategoriesSelect() 
// {
//   var x = document.getElementById("categories-select");
//   var addElement = document.getElementById("products-container");
//   addElement.innerHTML = "";
//   console.log(x.value);
//   getData(x.value, addElement);
// }


// function getData(id, addElement) 
// {
//     var htmlContent = "";

//     fetch('/product/category/' + id, {
//         method: 'get',
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     })
//     .then(response => response.json())
//     .then(function(myJson) {
//         console.log(JSON.stringify(myJson));
//         console.log(myJson);
        
//         if(myJson.length > 0 ) {
//             console.log("something");
//             for(var i = 0; i< myJson.length; i++) {
//                 htmlContent += productHtml(myJson[i]);
//             }
//         }
//         addElement.innerHTML += htmlContent; 

//     });
// }

// function productHtml(product)
// {
//     var htmlContent = '<a id="link" href="/product/'+ product.id;
//     htmlContent += '"><h1 style="margin-top: 30px;">' + product.name;
//     htmlContent += '</h1><img style="max-width:120px;" src="/images/products/' + product.image_name;
//     htmlContent += '" class="img-fluid img-thumbnail"><br><br><b> Price: €</b>' + product.price;
//     htmlContent += '-,<br><b>Product description:</b> '  + product.description; 
//     htmlContent += '<br><small><b>Products in stock:</b>  '  + product.stock;
//     htmlContent += ' <br><b>Product Added:</b>  ' + product.created_at;
//     htmlContent += ' </small> </a><hr>';
//     return htmlContent;
// }
</script>