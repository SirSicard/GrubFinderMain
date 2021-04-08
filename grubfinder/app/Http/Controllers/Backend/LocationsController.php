<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationsRequest;
use App\Models\County;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(County $county)
    {
        $locations = $county->locations()->get();
        return view('locations.index', compact('locations', 'county'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @param County $county
     * @return \Illuminate\Http\Response
     */
    public function create(County $county)
    {

        return view('locations.create', compact('county'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LocationsRequest $locationRequest
     * @param County $county
     * @return \Illuminate\Http\Response
     */
    public function store(LocationsRequest $locationRequest, County $county)
    {
        $locationRequest['slug'] = Str::slug($locationRequest->name, '-');
        $county->locations()->create($locationRequest->all());
        return redirect()->route('backend.counties.locations.index', $county);
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
