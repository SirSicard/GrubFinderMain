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
        $restaurants = $status->where('name','Verified')->first()->restaurants;
        return view('list', compact('restaurants'));
    }

    /**
     * @param Location $location
     * @param Category $category
     * @return mixed
     */
    public function filter(Request $request)
    {
//        post location  and category data from form
        $location = $request->location;
        $category = $request->category;
        $restaurants = Category::findOrFail($category)->restaurants->where('location_id',$location);

        return $restaurants;
    }


    public function addRestaurant(){
        return "form with Name, location, description, categories. Status will be selected by default to submitted from post method";
    }


}
