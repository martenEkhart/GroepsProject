<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="/css/app.css">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>JAAW</title>
    <style>
        .wrapper4 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(4, 1fr);
            grid-gap: 0.4em;
            background-color: #fff;
            color: #444;
        }

        div {
            text-align: center;
            user-select: none;
        }
        .box {
		background-color: rgb(120,70,123);
		border: 5px solid rgb(88,55,112);
		color: #fff;
		border-radius: 5px;
		padding: 0px;
		font: 150%/1.3 Lucida Grande,Lucida Sans Unicode,Lucida Sans,Geneva,Verdana,sans-serif;

	}
    button {
		background-color: rgb(120,70,123);
		border: 5px solid rgb(88,55,112);
		color: #fff;
		border-radius: 5px;
		padding: 0px;
		font: 150%/1.3 Lucida Grande,Lucida Sans Unicode,Lucida Sans,Geneva,Verdana,sans-serif;

	}
	.boxtransparency {
		background-image: linear-gradient(to right, rgb(219, 204, 223), rgb(121, 41, 212));
		/* background-color: rgb(60, 129, 161); */
		border: 5px solid rgb(88,55,112);
		color: #fff;
		border-radius: 5px;
		padding: 0px;
		font: 150%/1.3 Lucida Grande,Lucida Sans Unicode,Lucida Sans,Geneva,Verdana,sans-serif;

	}

	.boxSmallBig {
		background-color: rgb(60, 129, 161);
		border: 5px solid rgb(88,55,112);
		color: #fff;
		border-radius: 5px;
		padding: 0px;
		font: 150%/1.3 Lucida Grande,Lucida Sans Unicode,Lucida Sans,Geneva,Verdana,sans-serif;

	}

	.aUp { 
		grid-column: 2 / 3; 
		grid-row: 1 / 2;
	}
	.aDown { 
		grid-column: 2 /3; 
		grid-row: 3 / 4;
	}
	.aLeft { 
		grid-column: 1 / 2; 
		grid-row: 2 /3;
	}
	.aRight { 
		grid-column: 3 / 4; 
		grid-row: 2 / 3;
	}
	.aDone { 
		grid-column: 2 / 3; 
		grid-row: 2 /3  ;
	}
	.aTransparancy { 
		grid-column: 1 / 3; 
		grid-row: 4 / 5 ;
	}
	.aZindex { 
		grid-column: 3 / 5; 
		grid-row: 4 / 5 ;
	}
	.aUpF { 
		grid-column:4 / 5; 
		grid-row: 1 / 2 ;
	}
	.aDownF { 
		grid-column: 4 / 5; 
		grid-row: 3 / 4 ;
	}
	.aSmaller { 
		grid-column: 3 /4; 
		grid-row: 3 / 4 ;
	}
	.aBigger { 
		grid-column: 3 / 4; 
		grid-row: 1 / 2 ;
	}

    </style>
</head>
<body>
    @include('inc.navbar')

   
    <div class="container" style="margin-top: 10px;" >
         
         <div class="row">
          
    
           <div class="col-md-8 col-lg-8" style="padding-top: 10px;"> 
                    @yield('content')
    </div>        
        </div> 
            </div> 

            <footer id="footer" class="text-center" style= "margin-top: 1%;" >
                <p><b>Copyright 2018 &copy; JAAW</b></p>
            </footer>          
    <script src="{{ asset('js/app.js') }}" defer></script>
    

</body>
</html>