<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

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
        return view('admin/index');
    }

    public function getCategory () {
        return view('category');
    }



}
