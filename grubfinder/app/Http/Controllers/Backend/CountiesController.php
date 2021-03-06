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
        $counties = $county->orderByRaw('name')->with('locations', 'restaurants' )->paginate(6);
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
     * @param County $county
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(County $county)
    {
        //

        return view('counties.update', compact('county'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CountyRequest $countyRequest
     * @param County $county
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CountyRequest $countyRequest, County $county)
    {
        //

        $county->update($countyRequest->all());
        return redirect()->route('backend.counties.index');
    }


    public function restaurants(County $county)
    {
        $counties =  County::withCount('restaurants')->get();
        $locations = $county->locations()->pluck('name', 'id');
        $categories = Category::all()->pluck('name', 'id');
        $restaurants = $county->restaurants()->where('status_id', 4)->with('location.county','location','categories')
            ->get()
            ->sortByDesc('created_at');
        return view('list', compact('restaurants', 'locations', 'categories', 'counties'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param County $county
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request, County $county)
    {
        if($county->locations()->count()>0)
        {
            return redirect()->route('backend.dashboard')->with('message','Unable to delete the Counties, Please
            move any restaurants that belongs to this County before delete');
        }
        else{
            $county->delete($request->all());
            return redirect()->route('backend.dashboard')->with('message','Delete Success!');
        }
    }
}
