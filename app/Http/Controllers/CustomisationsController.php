<?php

namespace App\Http\Controllers;

use App\Customisation;
use Illuminate\Http\Request;
use Auth;

class CustomisationsController extends Controller
{

    public function updateCustomisation($customisation) {
        $customisation = Customisation::find($customisation);
        $customisation->image_name = $request->input('name');
        $customisation->x = $customisation.x;
    }

    public function dataToJavascript(Request $request) {
        //dd('klkl');
        $customisations = Customisation::where('name', $request->name)->get();
        $request->session()->put('key', $request->name);
// dd($customisations);
        return view('customisations.transfer', compact('customisations'));
    }

    public function changeData(Request $request) {
     //   return $request->id;
  
     $customisation = Customisation::find($request->id);
     $customisation->x = $request->x;
     $customisation->y = $request->y;
     $customisation->width  = $request->width;
     $customisation->height  = $request->height;
     $customisation->rotation = $request->rotation;
     $customisation->ratio = $request->ratio;
     $customisation->opacity  = floor($request->opacity * 100);
     $customisation->z_layer  = $request->z_layer;
     $customisation->visible  = $request->visible;
     $customisation->watermark_style = 1;
     $customisation->tag = $request->tag;
     $customisation->save();
  return $request->x." ".$request->y;
     
    }
 
    


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customisations = Custiomisation::All();
        return view('customisations.index')->with('customisations', $customisations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd("jj");//
        $customisations = Customisation::pluck('name', 'id');

        // if there is no customisation yet make a default customisation
        if(count($customisations) == 0) {
            $customisation = new Customisation();
            $customisation->name = 'Default name';
            $customisation->image_name = 'tijdelijk.ooo';
            $customisation->x = 0;
            $customisation->y = 0;
            $customisation->width = 200;
            $customisation->height = 200;
            $customisation->rotation = 0;
            $customisation->ratio = 1000;
            $customisation->z_layer = 0;
            $customisation->opacity = 1;
            $customisation->visible = true;
            $customisation->watermark_style = 1;
            $customisation->tag = 0;
            $customisation->save();
        }
        $customisations = Customisation::groupBy('name')->pluck('name', 'id');
        // dd($customisations);
         return view('customisations.create')->with('customisations', $customisations);

    }

    public function deleteItem(Request $request)
    {
        $customisation = Customisation::find($request->id);
        if($customisation){
            $customisation->delete();
            return response($customisation)
                ->header('Content-Type', 'application/json');
        }
        else {
            return response([])
                ->header('Content-Type', 'application/json');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  

        // handle file upload



        // create the produc

        if(Auth::user()->authorization_level != 1)
        {
            return redirect('/login')->with("error", "Unauthorized authentication");
        }


        $this->validate($request, [
            'name' => 'required',
            'image_name' => 'image|required|mimes:jpeg,png,jpg,gif,svg|max:1999'
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
            $request->file('image_name')->move(public_path('/images/customisations'), $fileNameToStore);
            

 


        // create the product

        $customisation = new Customisation();
        $customisation->name = $request->name;
        $customisation->image_name = $fileNameToStore;
        $customisation->x = 100;
        $customisation->y = 100;
        $customisation->width = 100;
        $customisation->height = 100;
        $customisation->rotation = 0;
        $customisation->ratio = 1000;
        $customisation->z_layer = 70;
        $customisation->opacity = 100;
        $customisation->visible = 1;
        $customisation->watermark_style = 1;
        $customisation->tag = 0;
        $customisation->save();

        $request->session()->put('key',$request->name);

            

        return redirect('customisation/manage/'.$request->name)->with('success', 'Customisation created');
    } else {
        $fileNameToStore = 'noImage.jpg';
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
