<?php

namespace App\Http\Controllers;

use App\Customisation;
use Illuminate\Http\Request;

class CustomisationsController extends Controller
{

    public function dataToJavascript() {
        //dd('klkl');
        $customisations = Customisation::all();
        return view('customisations.transfer', compact('customisations'));
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
            $customisation->z_layer = 0;
            $customisation->opacity = 1;
            $customisation->visible = true;
            //dd("be -  -ersa");
            $customisation->save();
        }
        $customisations = Customisation::pluck('name', 'id');

        return view('customisations.create')->with('customisations', $customisations);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image_name' => 'image|nullable|max:1999'
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
            $path = $request->file('image_name')->storeAs('public/customisation_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noImage.jpg';
        }


        // create the product

        $customisation = new Customisation();
        $customisation->name = $request->name;
        $customisation->image_name = $fileNameToStore;
        $customisation->x = $request->x;
        $customisation->y = $request->y;
        $customisation->width = $request->width;
        $customisation->height = $request->height;
        $customisation->z_layer = $request->z_layer;
        $customisation->opacity = $request->opacity;
        $customisation->visible = $request->visible;
        $customisation->save();
        return redirect('customisation')->with('success', 'Customisation created');
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
