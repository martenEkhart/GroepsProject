<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; 
use App\Category; 
use Auth;

use File;
class ProductsController extends Controller
{

    public function __construct()
    {
        // add exceptions to auth
        $this->middleware('auth', ['except' => ['index', 'show', 'search']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::All();
        return view('products.index')->with('products', $products);
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

        $categories = Category::pluck('name', 'id');

        // if there is no category yet make a default category
        if(count($categories) == 0) {
            $category = new Category();
            $category->name = 'Default category';
            $category->description = 'This is the default category';
            $category->save();
        }
        $categories = Category::pluck('name', 'id');

        return view('products.create')->with('categories', $categories);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');        
        $products = Product::where('name', 'like', '%'.$search.'%')->paginate(5);
        return view('inc.customer')->with('products', $products);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        if(Auth::user()->authorization_level != 1)
        {
            return redirect('/login')->with("error", "Unauthorized authentication");
        }


        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image_name' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:1999'
        ]);

        // handle file upload

        if($request->hasFile('image_name')) {
            // get file with extension
            $fileNameWithExt = $request->file('image_name')->getClientOriginalName();
            // get just the file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just the extension
            $extension = $request->file('image_name')->getClientOriginalExtension();
            // fileName to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            // upload the image
            // $path = $request->file('image_name')->storeAs('public/product_images', $fileNameToStore);
            $request->file('image_name')->move(public_path('images/products'), $fileNameToStore);
        } else {
            $fileNameToStore = 'noImage.jpg';
        }


        // create the product

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image_name = $fileNameToStore;
        $product->stock = $request->stock;
        $product->category_id = $request->category;
        $product->save();
        return redirect('/admin/index')->with('success', 'Product created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return view('products.show')->with('product', $product);
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
        $product = Product::find($id);
        // find all categories and put the category of the current product first so it will be selected in the view
        $categories = Category::pluck('name', 'id')->prepend($product->category->name, $product->category->id);
        return view('products.edit')->with(['product' => $product, 'categories' => $categories]);
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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image_name' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('image_name')) {
            // get file with extension
            $fileNameWithExt = $request->file('image_name')->getClientOriginalName();
            // get just the file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // get just the extension
            $extension = $request->file('image_name')->getClientOriginalExtension();
            // fileName to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            // upload the image
            $request->file('image_name')->move(public_path('images/products'), $fileNameToStore);
        }

        // create product
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        if($request->hasFile('image_name')) {
            $product->image_name = $fileNameToStore;
        }
        $product->stock = $request->stock;
        $product->category_id = $request->category;
        $product->save();

        return redirect('/admin/index')->with('success', 'Product updated');
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
        $product = Product::find($id);

        if($product->image_name != 'noImage.jpg') {
            if(File::exists('images/products/' . $product->image_name)) {
                File::delete('images/products/' . $product->image_name);
            }
        }
        $product->delete();

        return redirect('/admin/index')->with('success', 'Product deleted');

    }
}
