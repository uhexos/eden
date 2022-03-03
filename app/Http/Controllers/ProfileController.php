<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(profile::with('gardener', 'location', 'country')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|max:100',
            'lastname' => 'required|max:100',
            'country_id' => 'required|exists:countries,id',
            'location_id' => 'required|exists:locations,id',
        ]);
        $customer  =  new profile();
        $customer->firstname = $validated['firstname'];
        $customer->lastname =  $validated['lastname'];
        $customer->country_id = $validated['country_id'];
        $customer->location_id = $validated['location_id'];
        $customer->user_id = $request->user()->id;
        if (profile::where('user_id', '=', $request->user()->id)->exists()) {
            $profile =  profile::where('user_id', '=', $request->user()->id)->get();
            return $profile->load('country', 'location');
        }
        $customer->save();
        return response()->json($customer->load('country', 'location'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(profile $profile)
    {
        return $profile->load('gardeners');
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
