<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Location;
use App\Models\Restaurant;
use App\Models\Status;
use Illuminate\Http\Request;

class BusinessesController extends Controller
{
    //

    public function index(Status $status)
    {
        $locations = Location::all()->pluck('name', 'id');
        $categories = Category::all()->pluck('name', 'id');
        $restaurants = $status->where('name','Verified')->first()->restaurants;
        return view('list', compact('restaurants', 'locations', 'categories'));
    }

    /**
     * @param Location $location
     * @param Category $category
     * @return mixed
     */
    public function filter(Request $request)
    {
        //post location  and category data from form
        $locations = Location::all()->pluck('name', 'id');
        $categories = Category::all()->pluck('name', 'id');
        $location = $request->location;
        $category = $request->category;
        $restaurants = Category::findOrFail($category)->restaurants->where('location_id',$location);

        return view('list', compact('restaurants', 'locations', 'categories'));
    }
 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @param Restaurant $restaurant
     * @param RestaurantsRequest $restaurantsRequest
     * @return void
     */

    public function addRestaurant(Restaurant $restaurant, RestaurantsRequest $restaurantsRequest){
        //return "form with Name, location, description, categories. Status will be selected by default to submitted from post method";
        return view('add');
    }


}
