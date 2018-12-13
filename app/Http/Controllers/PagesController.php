<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Auth;
use App\Product;



=======

use Auth;
use App\Product;
<<<<<<< HEAD
 
=======
=======
use Auth; 
use App\Product; 

<<<<<<< HEAD
=======
>>>>>>> 4725180a904c1bcef5072a9cc45d9601c1cb7f85
>>>>>>> 98575147b3abaf9a38b2ec4ac1d3bfbb04846406
>>>>>>> ea6b4e749f7c6f4f5faa597219117a064dd06cfb
>>>>>>> 718c1f98b350631eb00c25b6fe77e7ec393e30b8
>>>>>>> 5c376b42025bd23ba81058cee1a61f7a3c5b100e

class PagesController extends Controller
{
    public function __construct()
    {
        // add exceptions to auth
        $this->middleware('auth')->only('getAdmin');
    }


    public function getContact(){
        return view('pages/contact');
    }

    public function getIndex () {
        // return view('pages/index');
        $products = Product::All();
        return view('pages.index')->with('products', $products);
    }

    public function getProducten() {
        return view('pages/producten');
    }

    public function getProductenTRaoul() {
      $products = Product::all();
        return view('pages/productenTRaoul', compact('products'));
    }

    public function getKlant () {
        $products = Product::orderBy('created_at', 'desc')->paginate(8);
        return view('pages/index' , compact('products'));
    }

    public function getAdmin () {
        if(Auth::user()->authorization_level != 1)
        {
            return redirect('/login')->with("error", "Unauthorized authentication");
        }

        return view('admin/index');
    }

}
