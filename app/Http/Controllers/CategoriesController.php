<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User; 


class CategoriesController extends Controller
{

    public function __construct()
    {
        // add exceptions to auth
        $this->middleware('auth', ['except' => ['index', 'show', 'main']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
    
        return view('categories.index')->with('categories', $category);
    }

    public function main()
    {
        $category = Category::All();
    
        return view('inc.categories')->with('categories', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->authorization_level != 1)
        {
            return redirect('/login')->with("error", "Unauthorized authentication");
        }
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->authorization_level != 1)
        {
            return redirect('/login')->with("error", "Unauthorized authentication");
        }
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
          ]);

          // Create Categorie
          $category = new Category;
          $category->name = $request->input('name');
          $category->description = $request->input('description');

          $category->save();
  
          return redirect('/admin/index')->with('success', 'Category Added'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->authorization_level != 1)
        {
            return redirect('/login')->with("error", "Unauthorized authentication");
        }
        $category = Category::find($id);
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->authorization_level != 1)
        {
            return redirect('/login')->with("error", "Unauthorized authentication");
        }
      
       $category = Category::find($id);
       $category->name = $request->input('name');
       $category->description = $request->input('description');
       
 
       $category->save();
 
       return redirect('/admin/index')->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->authorization_level != 1)
        {
            return redirect('/login')->with("error", "Unauthorized authentication");
        }
        $category = category::find($id);
        $category->delete();

        return redirect('/admin/index')->with('error', 'Category Removed');
    }
}
