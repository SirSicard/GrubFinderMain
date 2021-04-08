@extends('backend')
@section('content')
    <div class="border-b-2 border-gray-900 border-solid">
        <h1 class="inline-block mb-4 text-6xl text-gray-200">
            Counties
        </h1>

        <div class="inline-block float-right font-bold button">
            <a href="{{ route('backend.counties.create') }}">
                <svg  xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 pb-1" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>Create New
            </a>


        </div>

    </div>

    <div class="grid grid-cols-5 font-bold text-gray-200">
        <div class="col-span-1">ID</div>
        <div>Name</div>
        <div class="col-span-2">Description</div>
        <div>Actions</div>

        @foreach($counties as $county)
            <div class="col-span-1 mt-4">{{$county->id}}</div>
            <div class="mt-4">{{$county->name}}({{ $county->locations->count() }})</div>
            <div class="col-span-2 mt-4">{{$county->description}} Has {{ $county->restaurants->count() }}
                Restaurants</div>
            <div>
                {!! Form::open(['route' => ['backend.counties.destroy', $county], 'method' =>'delete']) !!}
                <div class="block inline-block float-right p-4 mt-4 mr-4 text-red-900 transition duration-300 ease-out transform bg-red-400 rounded hover:bg-red-300 hover:text-red-800 hover:shadow-inner hover:scale-105 hover:bg-opacity-50">
                    <button type="submit" class="font-bold">Delete</button>
                </div>
                {!! Form::close() !!}

                <div class="inline-block float-right mt-4 mr-4 font-bold button">
                    <a href="{{ route('backend.counties.edit', $county) }}">Update</a>
                </div>

                <div class="inline-block float-right mt-4 mr-4 font-bold button">
                    <a href="{{ route('backend.counties.locations.index', $county) }}">View Location</a>
                </div>

            </div>

        @endforeach
    </div>
@endsection
