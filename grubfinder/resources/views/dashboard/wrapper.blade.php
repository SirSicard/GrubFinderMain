@extends('backend')
@section('content')
<div class="border-b-2 border-solid  border-gray-900">
    <h1 class="text-6xl text-gray-200">
        Hello, {{ auth()->user()->name }}.
    </h1>
    <h3 class="text-xl text-gray-400 my-5">
        Today is {{  today()->format('Y-m-d') }} and below are the highlights.
    </h3>
</div>
<!-- cards goes here -->
<div class="flex flex-row border-b-2 border-solid  border-gray-900">
    <!-- card one -->
    <div class="card-wrapper">
        <h2 class=" from-blue-900	 to-purple-900 ">
            Restaurants Status
        </h2>
        <p class="p-5 text-xl">
            Total registered: 1000<br>
            Total Active: 800<br>
            Inactive: 200<br>
        </p>
    </div>
    <!-- card two -->
    <div class="card-wrapper">
        <h2 class=" from-purple-900 	 to-red-900 ">
            Locations Status
        </h2>
        <p class="p-5 text-xl">
            Total Locations: 1000<br>
            Locations in use: 800<br>
            Inactive: 200<br>
        </p>
    </div>
    <!-- card three -->
    <div class="card-wrapper">
        <h2 class=" from-red-900	 to-blue-900 ">
            Categories Status
        </h2>
        <p class="p-5 text-xl">
            Total registered: 1000<br>
            Total Active: 800<br>
            Inactive: 200<br>
        </p>

    </div>
</div>

<!-- quick actions -->

<div class="quick-actions">
    <a href="#" class="bg-green-600 hover:bg-green-700">Create a Restaurant</a>
    <a href="#" class="bg-green-600 hover:bg-green-700">Create a Location</a>
    <a href="#" class="bg-green-600 hover:bg-green-700">Create a Category</a>
</div>

@endsection
