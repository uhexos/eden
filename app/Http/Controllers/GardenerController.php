<?php

namespace App\Http\Controllers;

use App\Models\gardener;
use Illuminate\Http\Request;

class GardenerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(gardener::with('customers', 'location', 'country')->get());
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
        $gardener  =  new gardener();
        $gardener->firstname = $validated['firstname'];
        $gardener->lastname =  $validated['lastname'];
        $gardener->country_id = $validated['country_id'];
        $gardener->location_id = $validated['location_id'];
        $gardener->user_id = $request->user()->id;
        if (gardener::where('user_id', '=', $request->user()->id)->exists()) {
            $profile =  gardener::where('user_id', '=', $request->user()->id)->get();
            return response()->json($profile->load('customers', 'location', 'country'));
        }
        $gardener->save();
        return response()->json($gardener->load('customers', 'location', 'country'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(gardener::with('customers', 'location', 'country')->findOrFail($id));
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
