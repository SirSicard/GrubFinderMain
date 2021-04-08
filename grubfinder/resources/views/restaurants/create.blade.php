@extends('backend')
@section('content')
    <div class="border-b-2 border-gray-900 border-solid">
        <h1 class="inline-block mb-4 text-6xl text-gray-200">
            Create New Restaurant
        </h1>



    </div>
    {!! Form::open(['route' => 'backend.restaurants.store','class' => 'space-y-5']) !!}
    <div class="grid grid-cols-2">
        <div>
            <label for="name" class="text-gray-200">Name</label>
        </div>
        <div>
            {{ Form::text('name', null, ['class' => 'w-full', 'id' => 'name']) }}
        </div>

        <div>
            <label class="text-gray-200" for="description">Description</label>

        </div>
        <div>
            {{ Form::textarea('description', null, ['class' => 'w-full', 'id' => 'description']) }}
        </div>

        <div>
            <label class="text-gray-200" for="address">Address</label>

        </div>
        <div>
            {{ Form::text('address', null, ['class' => 'w-full', 'id' => 'address']) }}
        </div>


        <div>
            <label for="phone" class="text-gray-200">Phone</label>
        </div>
        <div>
            {{ Form::text('phone', null, ['class' => 'w-full', 'id' => 'phone']) }}
        </div>

        <div>
            <label for="website" class="text-gray-200">Website</label>
        </div>
        <div>
            {{ Form::text('website', null, ['class' => 'w-full', 'id' => 'website']) }}
        </div>

        <div>
            <label for="gmap" class="text-gray-200">Google Map</label>
        </div>
        <div>
            {{ Form::text('gmap', null, ['class' => 'w-full', 'id' => 'gmap']) }}
        </div>

        <div>
            <label for="location_id" class="text-gray-200">Location</label>
        </div>
        <div>
            {{ Form::text('location_id', null, ['class' => 'w-full', 'id' => 'location']) }}
        </div>
        <div>
            <label for="status" class="text-gray-200">Status</label>
        </div>
        <div>
            {{ Form::select('status_id', $statuses, ['class' => 'w-full', 'id' => 'status',
            'multiple'=>'multiple']) }}
        </div>
        <div>
            Categories
        </div>

        <div>
            @foreach($categories as $category)
                    <label>{{ $category->name }}</label>
            {{ Form::checkbox('categories[]', $category->id)  }}
            @endforeach
        </div>






    </div>
    <button class="float-right">
        <div class="font-bold button">
            <svg  xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 pb-1" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>Create New
        </div>
    </button>

    {!! Form::close() !!}
@endsection
