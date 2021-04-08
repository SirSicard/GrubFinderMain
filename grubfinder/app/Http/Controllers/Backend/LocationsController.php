<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationsRequest;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Location $location)
    {
        $locations = $location->get();
        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationsRequest $locationRequest, Location $location)
    {
        $location->create($locationRequest->all());
        return redirect()->route('backend.locations.index');
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
    public function edit(Location $location)
    {
        return view('locations.update', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LocationsRequest $locationRequest
     * @param Location $location
     * @return \Illuminate\Http\Response
     */
    public function update(LocationsRequest $locationRequest, Location $location)
    {
        $location->update($locationRequest->all());
        return redirect()->route('backend.locations.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Location $location
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Location $location)
    {

        $location->delete();

        return redirect()->route('backend.locations.index');
    }
}
