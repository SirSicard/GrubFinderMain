@extends('nav')
@section('frontend')
    <section class="p-4 pb-3 py-8 bg-white border-b text-center m-auto w-1/2">

        <div class="border-b-2  border-gray-900 border-solid">
            <h1 class="inline-block mb-4 text-6xl text-black">
                Create a new restaurant suggestion
            </h1>

            <ul>@foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach</ul>

        </div>
        {!! Form::open(['route' => 'add','class' => 'space-y-5']) !!}
        <div class="">
            <div>
                <label for="name" class="text-black">Name</label>
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
                <label class="text-black" for="description">Description</label>

            </div>
            <div>
                {{ Form::textarea('description', null, ['class' => 'w-full', 'id' => 'description']) }}
            </div>

            <div>
                <label class="text-black" for="address">Address</label>

            </div>
            <div>
                {{ Form::text('address', null, ['class' => 'w-full', 'id' => 'address']) }}
            </div>


            <div>
                <label for="phone" class="text-black">Phone</label>
            </div>
            <div>
                {{ Form::text('phone', null, ['class' => 'w-full', 'id' => 'phone']) }}
            </div>

            <div>
                <label for="website" class="text-black">Website</label>
            </div>
            <div>
                {{ Form::text('website', null, ['class' => 'w-full', 'id' => 'website']) }}
            </div>

            <div>
                <label for="lat" class="text-black">Latitude</label>
            </div>
            <div>
                {{ Form::text('lat', null, ['class' => 'w-full', 'id' => 'lat']) }}
            </div>
            <div>
                <label for="lng" class="text-black">Longitude</label>
            </div>
            <div>
                {{ Form::text('lng', null, ['class' => 'w-full', 'id' => 'lng']) }}
            </div>

            <div>
                <label for="location_id" class="text-black">Location</label>
            </div>
            <div>
                {{ Form::select('location_id', $locations, ['class' => 'w-full', 'id' => 'location']) }}
            </div>
            {{-- <div>
                <label for="status" class="text-black">Status</label>
            </div>
            <div>
                {{ Form::select('status_id', $statuses, ['class' => 'w-full', 'id' => 'status']) }}
            </div> --}}
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
        <button class="m-auto">
            <div class="font-bold button w-96">
                <svg  xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 pb-1 " fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>Submit
            </div>
        </button>

        {!! Form::close() !!}

    </section>
  </body>
</html>
@endsection
