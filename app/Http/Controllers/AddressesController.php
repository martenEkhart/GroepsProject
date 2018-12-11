<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\User; 
use Auth; 
class AddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address = Address::All();
        return view('addresses.index')->with('address', $address);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addresses.create');
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
            'zipcode' => 'required',
            'street' => 'required',
            'house_number' => 'required',
            'city' => 'required',
            'country' => 'required'
          ]);
        
        // create address

         $address = new Address();
         $address->user_id = Auth::user()->id;
         $address->zipcode = $request->input('zipcode');
         $address->street = $request->input('street');
         $address->house_number = $request->input('house_number');
         $address->city = $request->input('city');
         $address->country  = $request->input('country');
         $address->phone_number = $request->input('phone_number');
         $address->save();

         return redirect('/admin/index')->with('success', 'Address Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {

        $address = Address::where('user_id', $user_id)->get();
        return view('addresses.show')->with('addresses', $address);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = Address::find($id);
        return view('addresses.edit')->with('address', $address);
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
        $this->validate($request, [
            'zipcode' => 'required',
            'street' => 'required',
            'house_number' => 'required',
            'city' => 'required',
            'country' => 'required'
          ]);
        
        // update address

         $address = Address::find($id);
         $address->user_id = Auth::user()->id;
         $address->zipcode = $request->input('zipcode');
         $address->street = $request->input('street');
         $address->house_number = $request->input('house_number');
         $address->city = $request->input('city');
         $address->country  = $request->input('country');
         $address->phone_number = $request->input('phone_number');
         $address->save();
         
         return redirect('/admin/index')->with('success', 'Address Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::find($id);
        $address->delete();

        return redirect('/')->with('error', 'Address Removed');
    }
}
