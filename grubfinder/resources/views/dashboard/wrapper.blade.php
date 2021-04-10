@extends('backend')
@section('content')
<div class="border-b-2 border-gray-900 border-solid">
    <h1 class="text-6xl text-gray-200">
        Hello, {{ auth()->user()->name }}.
    </h1>
    <h3 class="my-5 text-xl text-gray-400">
        Today is {{  today()->format('Y-m-d') }} and below are the highlights.
    </h3>
</div>
<!-- cards goes here -->
<div class="flex flex-row border-b-2 border-gray-900 border-solid">
    <!-- card one -->
    <div class="card-wrapper">
        <h2 class=" from-blue-900 to-purple-900">
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
        <h2 class=" from-purple-900 to-red-900">
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
        <h2 class=" from-red-900 to-blue-900">
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
    <a href="{{ route('backend.restaurants.create') }}" class="block inline-block float-right p-4 mt-2 mb-2 mr-4 font-bold text-blue-900 transition duration-300 ease-out transform bg-blue-400 rounded hover:bg-blue-300 hover:text-blue-800 hover:shadow-inner hover:scale-105 hover:bg-opacity-50">Create a Restaurant</a>
    <a href="{{ route('backend.counties.index')  }}" class="block inline-block float-right p-4 mt-2 mb-2 mr-4 font-bold text-blue-900 transition duration-300 ease-out transform bg-blue-400 rounded hover:bg-blue-300 hover:text-blue-800 hover:shadow-inner hover:scale-105 hover:bg-opacity-50">Create a Location</a>
    <a href="{{ route('backend.categories.create') }}" class="block inline-block float-right p-4 mt-2 mb-2 mr-4 font-bold text-blue-900 transition duration-300 ease-out transform bg-blue-400 rounded hover:bg-blue-300 hover:text-blue-800 hover:shadow-inner hover:scale-105 hover:bg-opacity-50">Create a Category</a>
</div>

@endsection
