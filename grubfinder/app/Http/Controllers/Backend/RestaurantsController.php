<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantsRequest;
use App\Http\Requests\StatusRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\Restaurant;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Restaurant $restaurant
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Restaurant $restaurant)
    {
        //

        $restaurants = $restaurant->orderByRaw('created_at DESC')->with('location', 'categories', 'status')->paginate(4);

        return view('restaurants.index', compact('restaurants'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        $statuses = Status::all()->pluck('name','id');
        $categories = Category::all();
        $locations = Location::all()->pluck('name','id');
//        return $statuses;
        return view('restaurants.create',compact('statuses', 'categories','locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Restaurant $restaurant
     * @param RestaurantsRequest $restaurantsRequest
     * @return void
     */
    public function store(Restaurant $restaurant, RestaurantsRequest $restaurantsRequest)
    {
        // create the restaurant first
        $restaurantsRequest['slug'] = Str::slug($restaurantsRequest->name, '-');
        $restaurant->create($restaurantsRequest->all())
        ->categories()->sync($restaurantsRequest->categories);

        return redirect()->route('backend.restaurants.index');


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
    public function edit(Restaurant $restaurant)
    {
        $statuses = Status::all()->pluck('name','id');
        $categories = Category::all();
        $locations = Location::all()->pluck('name','id');

        return view('restaurants.update', compact('restaurant', 'statuses', 'categories', 'locations'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Restaurant $restaurant, RestaurantsRequest $restaurantsRequest, StatusRequest $statusRequest)
    {
        $restaurant->update($restaurantsRequest->all());
        $restaurant->categories()->sync($restaurantsRequest->categories);
        return redirect()->route('backend.restaurants.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant, RestaurantsRequest $restaurantsRequest)
    {
        $restaurant->delete($restaurantsRequest->all());

        return redirect()->route('backend.restaurants.index');
    }
}
