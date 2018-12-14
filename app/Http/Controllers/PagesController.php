<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;

<<<<<<< HEAD
=======




>>>>>>> 8574c6c83af720d90a6f2bca2780b56bf4f8f27c
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
