@extends('backend')
@section('content')
    <div class="border-b-2 border-gray-900 border-solid">
        <h1 class="inline-block mb-4 text-6xl text-gray-200">
            Restaurants
        </h1>

        <div class="block inline-block float-right p-4 mt-2 mb-2 mr-4 font-bold text-blue-900 transition duration-300 ease-out transform bg-blue-400 rounded hover:bg-blue-300 hover:text-blue-800 hover:shadow-inner hover:scale-105 hover:bg-opacity-50">
            <a href="{{ route('backend.restaurants.create') }}">
                <svg  xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 pb-1" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>Create New
            </a>
        </div>

    </div>

    <div class="grid grid-cols-5 font-bold text-gray-200">
        <div class="col-span-1">Status</div>
        <div>Name</div>
        <div >Location</div>
        <div >Categories</div>
        <div>Actions</div>

        @foreach($restaurants as $restaurant)
            <div class="col-span-1 mt-4 border-b">{{$restaurant->status->name}}</div>
            <div class="mt-4 border-b">{{$restaurant->name}}</div>
            <div class="mt-4 border-b">{{$restaurant->location->name}}</div>
            <div class="mt-4 border-b">{{$restaurant->categories->implode('name', ', ')}}</div>
            <div class="border-b">
                <div class="block inline-block float-right p-4 mt-2 mb-2 mr-4 text-gray-900 transition duration-300 ease-out transform bg-gray-400 rounded hover:bg-gray-300 hover:text-gray-800 hover:shadow-inner hover:scale-105 hover:bg-opacity-50">
                    {!! Form::open(['route' => ['backend.restaurants.destroy', $restaurant], 'method' =>'delete']) !!}
                        <button type="submit" class="font-bold">Delete</button>
                    {!! Form::close() !!}
                </div>
                <div class="block inline-block float-right p-4 mt-2 mb-2 mr-4 text-blue-900 transition duration-300 ease-out transform bg-blue-400 rounded hover:bg-blue-300 hover:text-blue-800 hover:shadow-inner hover:scale-105 hover:bg-opacity-50">
                    <a href="{{ route('backend.restaurants.edit', $restaurant) }}">Update</a>
                </div>
            </div>

        @endforeach
       
    </div>

    <nav class="m-4">
        {{ $restaurants->links() }}
    </nav>

@endsection
