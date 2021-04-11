<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantsRequest;
use App\Models\Category;
use App\Models\County;
use App\Models\Location;
use App\Models\Restaurant;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BusinessesController extends Controller
{


    public function index()
    {
        $counties =  County::withCount('restaurants')->get();
        $locations = Location::all()->pluck('name', 'id');
        $categories = Category::all()->pluck('name', 'id');
        $restaurants = Status::where('name','Verified',)->first()->restaurants;
        return view('list', compact('restaurants', 'locations', 'categories', 'counties'));
    }

    /**
     * @param Location $location
     * @param Category $category
     * @return mixed
     */
    public function filter(Request $request)
    {
        //post location  and category data from form
        $counties =  County::withCount('restaurants')->get();
        $locations = Location::all()->pluck('name', 'id');
        $categories = Category::all()->pluck('name', 'id');
        $location = $request->location;
        $category = $request->category;
        $restaurants = Category::findOrFail($category)
            ->restaurants
            ->with('location')
            ->where('location_id',$location)
            ->where('status_id',4);
        return view('list', compact('restaurants', 'locations', 'categories', 'counties'));
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


    public function showRestaurant(Restaurant $restaurant)
    {
        // $counties =  County::withCount('restaurants')->get();
        // $locations = Location::all()->pluck('name', 'id');
        // $categories = Category::all()->pluck('name', 'id');
        return view('restaurant', ['restaurant' => $restaurant], compact('restaurant'));
    }

}
