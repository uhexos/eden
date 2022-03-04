<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Location::withCount('country', 'customers', 'gardeners')->get());
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
            'name' => 'required|max:100|unique:locations,name',
            'country_id' => 'required|exists:countries,id'
        ]);
        $location = new Location();
        $location->name =  $validated['name'];
        $location->country_id =  $validated['country_id'];
        $location->save();
        return response()->json($location->load('country'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        // $validated = $request->validate([
        //     'name' => 'required|max:100|unique:locations,name',
        //     'country_id'=> 'required|exists:countries,id'
        // ]);
        return response()->json($location->load('country', 'customers', 'gardeners'));
    }
}
