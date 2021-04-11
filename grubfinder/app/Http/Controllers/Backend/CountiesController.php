<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountyRequest;
use App\Models\Category;
use App\Models\County;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CountiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param County $county
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index( County $county)
    {
        //
        $counties = $county->orderByRaw('name')->with('locations', 'restaurants', )->paginate(6);
        return view('counties.index', compact('counties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('counties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param County $county
     * @param CountyRequest $countyRequest
     * @return \Illuminate\Http\Response
     */
    public function store(County $county, CountyRequest $countyRequest)
    {
        //
        $countyRequest['slug'] = Str::slug($countyRequest->name, '-');
        $county->create($countyRequest->all());
        return redirect()->route('backend.counties.index');
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


    public function restaurants(County $county)
    {
        $counties =  County::withCount('restaurants')->get();
        $locations = Location::all()->pluck('name', 'id');
        $categories = Category::all()->pluck('name', 'id');
        $restaurants = $county->restaurants->paginate(2)->where('status_id', 4)->sortByDesc('created_at');
        return view('list', compact('restaurants', 'locations', 'categories', 'counties'));
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
