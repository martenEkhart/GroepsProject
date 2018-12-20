<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\Category;

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
        $categories = Category::All();
        return view('pages.index')->with(['products' => $products, 'categories', $categories]);
    }

    public function getProducten() {
        return view('pages/producten');
    }

    public function getProductenTRaoul() {
      $products = Product::all();
        return view('pages/productenTRaoul', compact('products'));
    }

    public function getAdds () {
        $categories = Category::All();
        $products = Product::orderBy('created_at', 'desc')->paginate(12);
        // return view('pages/index' , compact('products', 'category'));
        return view('pages.index')->with(['products' => $products, 'categories' => $categories]);

    }

    public function getAddress () {

        $address = Address::where('user_id', $user_id)->get();
        return view('carts.')->with('address', $address);
    }


    public function getAdmin () {
        if(Auth::user()->authorization_level != 1)
        {
            return redirect('/login')->with("error", "Unauthorized authentication");
        }

        return view('admin/index');
    }

}
