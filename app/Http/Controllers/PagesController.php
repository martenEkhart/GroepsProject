<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; 

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
        return view('pages/index');
    }
    
    public function getProducten() {
        return view('pages/producten');
    }
    
    public function getKlant () {
        return view('pages/klant');
    }
    
    public function getAdmin () {
        if(Auth::user()->authorization_level != 1)
        {
            return redirect('/login')->with("error", "Unauthorized authentication");
        }

        return view('admin/index');
    }

}
