@extends('backend')
@section('content')
    <div class="border-b-2 border-gray-900 border-solid">
        <h1 class="inline-block mb-4 text-6xl text-gray-200">
            Update {{ $restaurant->name }}
        </h1>



    </div>

    <section>
    {!! Form::model($restaurant,['route' => ['backend.restaurants.update', $restaurant],'class' => 'space-y-5',
    'method' => 'put']) !!}
    <div class="grid grid-cols-2">
        <div>
            <label for="name" class="text-gray-200">Name</label>
        </div>
        <div>
            {{ Form::text('name', null, ['class' => 'w-full', 'id' => 'name']) }}
            @error('name')
            <div class="mt-2 text-sm text-red-500">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div>
            <label class="text-gray-200" for="description">Description</label>

        </div>
        <div>
            {{ Form::textarea('description', null, ['class' => 'w-full', 'id' => 'description']) }}
            @error('description')
            <div class="mt-2 text-sm text-red-500">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div>
            <label class="text-gray-200" for="address">Address</label>

        </div>
        <div>
            {{ Form::text('address', null, ['class' => 'w-full', 'id' => 'address']) }}
            @error('address')
            <div class="mt-2 text-sm text-red-500">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div>
            <label for="phone" class="text-gray-200">Phone</label>
        </div>
        <div>
            {{ Form::text('phone', null, ['class' => 'w-full', 'id' => 'phone']) }}
            @error('phone')
            <div class="mt-2 text-sm text-red-500">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div>
            <label for="website" class="text-gray-200">Website</label>
        </div>
        <div>
            {{ Form::text('website', null, ['class' => 'w-full', 'id' => 'website']) }}
            @error('website')
            <div class="mt-2 text-sm text-red-500">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div>
            <label for="lat" class="text-gray-200">Latitude</label>
        </div>
        <div>
            {{ Form::text('lat', null, ['class' => 'w-full', 'id' => 'lat']) }}
        </div>
        <div>
            <label for="lng" class="text-gray-200">Longitude</label>
        </div>
        <div>
            {{ Form::text('lng', null, ['class' => 'w-full', 'id' => 'lng']) }}
        </div>

        <div>
            <label for="location_id" class="text-gray-200">Location</label>
        </div>
        <div>
            {{ Form::select('location_id', $locations,$restaurant->location_id, ['class' => 'w-full', 'id' =>
            'location']) }}
            @error('location_id')
            <div class="mt-2 text-sm text-red-500">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label for="status" class="text-gray-200">Status</label>
        </div>
        <div>
            {{ Form::select('status_id', $statuses,$restaurant->status_id, ['class' => 'w-full', 'id' => 'status']) }}
            @error('status_id')
            <div class="mt-2 text-sm text-red-500">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="text-gray-200">
            Categories
        </div>

        <div>
            @foreach($categories as $category)

                {{ Form::checkbox('categories[]', $category->id)  }}
                <label  class="text-gray-200">{{ $category->name }}</label>
            @endforeach

        </div>






    </div>
    <button class="float-right">
        <div class="font-bold button">
            <svg  xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 pb-1" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>Update
        </div>
    </button>

    {!! Form::close() !!}

    </section>


<section class="pt-10 mt-10">
    {{-- social start here --}}
    {!! Form::open(['route' => ['backend.restaurants.link', $restaurant],'class' => 'space-y-5',]) !!}

    <div class="grid grid-cols-3 mt-5">
        <div class="font-bold text-white text-center">
            Link Type
        </div>
        <div class="font-bold text-white text-center">
            URL
        </div>
        <div class="font-bold text-white text-right">
            Actions
        </div>

        <div>
            {{ Form::select('type', ['Website'=>'Website','Socail Media'=>'Social Media', 'Youtube'=>'Youtube',
            'Email'=>'Email'],
            null,
            ['class' =>
            'w-full', 'id' =>
            'type']) }}

        </div>
        <div>
            {{ Form::text('url', null, ['class' => 'w-full', 'id' => 'url']) }}
        </div>
        <div>
            <button class="float-right">
                <div class="font-bold button">
                    <svg  xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 pb-1" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>Add
                </div>
            </button>
        </div>

        {!! Form::close() !!}

        @foreach($restaurant->links as $link)

            <div class="font-bold text-white text-center">
                {{$link->type}}
            </div>
            <div class="font-bold text-white text-center">
                {{ $link->url }}
            </div>
            <div class="font-bold text-white text-right">
                {!! Form::model($link,['route' => ['backend.linkDelete', $link],'method' => 'delete']) !!}
                <input name="id" value="{{ $link->id }}" hidden>
                <button class="float-right">
                    <div class="font-bold button">
                        <svg  xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 pb-1" fill="none" viewBox="0 0 24 24"
                              stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>Delete
                    </div>
                </button>
                {!! Form::close() !!}
            </div>

        @endforeach

    </div>








</section>
@endsection
