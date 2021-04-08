<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Status;
use Illuminate\Http\Request;

class BusinessesController extends Controller
{
    //

    public function index(Status $status)
    {
        $restaurants = $status->where('id',3)->first()->restaurants;
        return $restaurants;
    }


}
