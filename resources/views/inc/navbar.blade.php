  <nav class="navbar navbar-expand-sm sticky-top " style= "font-size: 22px">
        {{-- <a class="navbar-brand" href="#"style= "color: #32adc3;"><b style= "font-size: 26px;">J.A.A.W</b></a> --}}
        <button class="navbar-toggler btn btn-light btn-lg"  type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
         <b style="font-size: 28px"><p style="color: black">Menu</p></b>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample03" style="color: black">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" style="color: black" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            {{-- <li class="nav-item active">
              <a class="nav-link" style="color: black" href="/product">Producten</a>
            </li>
            <li class="nav-item active">
       
          
            {{-- @if ($carts)
            @php echo "hoi"; @endphp
            (Cart::where('cart_id',$this->cart_id->id)->first() && Cart_Product::where('product_id',$product_id)->first())
            @endif --}}
            @if(!Auth::guest())
                <a class="nav-link" style="color: black" href="/cart/{{Auth::user()->id}}">Shopping cart</a>
            @endif
            </li>
            {{-- <li class="nav-item active">
              <a class="nav-link" style="color: black" href="/klant">Klant</a>
            </li>
            <li class="nav-item active">
                    <a class="nav-link" style="color: black" href="/contact">Contact</a>
                  </li> --}}
                   @if(!Auth::guest())
                   @if(Auth::user()->authorization_level == 1)

                   <li class="nav-item active">
                     <a class="nav-link" style="color: black" href="/customisation/manage">Customisations</a>
                   </li>
                   <li class="nav-item active">
                     <a class="nav-link" style="color: black" href="/admin/index">Admin</a>
                   </li>
                  @endif
                  @endif
            {{-- <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle"  id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
              <div class="dropdown-menu" aria-labelledby="dropdown03">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li> --}}
          </ul>
          {{-- <form class="form-inline my-2 my-md-0">
            <input class="form-control" type="text" placeholder="Search">
          </form> --}}
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item active">
                    <a class="nav-link" style="color: black" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item active">
                    @if (Route::has('register'))
                        <a class="nav-link" style="color: black" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </li>
            @else
                <li class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <a  class="dropdown-item" href="/dashboard"></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
        </div>
      </nav>
