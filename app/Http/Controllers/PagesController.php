<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 
<<<<<<< HEAD
use App\Product;
=======
use App\Product; 

>>>>>>> 4725180a904c1bcef5072a9cc45d9601c1cb7f85

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
    
    public function getKlant () {
        $products = Product::all();
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
