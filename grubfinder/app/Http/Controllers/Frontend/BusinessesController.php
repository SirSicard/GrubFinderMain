<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantsRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\Restaurant;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BusinessesController extends Controller
{


    public function index(Status $status)
    {
        $locations = Location::all()->pluck('name', 'id');
        $categories = Category::all()->pluck('name', 'id');
        $restaurants = $status->where('name','Verified')->first()->restaurants;
        //$restaurants = $restaurant->with('location', 'categories')->get();
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
        //$restaurants = $status->where('name','Verified')->first()->restaurants;
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

    public function addRestaurant(){
        //return "form with Name, location, description, categories. Status will be selected by default to submitted from post method";
        $locations = Location::all()->pluck('name', 'id');
        $categories = Category::all();
        return view('add', compact('locations', 'categories'));
    }

    public function storeRestaurant(RestaurantsRequest $restaurantsRequest, Restaurant $restaurant){
        $restaurantsRequest['slug'] = Str::slug($restaurantsRequest->name, '-');
        $restaurantsRequest['status_id'] = 1;
        $restaurant->create($restaurantsRequest->all())
        ->categories()->sync($restaurantsRequest->categories);
        return redirect()->route('home');
    }

}
