@extends('nav')


@section('google-map-stuff')

        <script>
            // Initialize and add the map
            function initMap() {
                // The location of Uluru
                @if(request()->is('/'))
                    let center = { lat: 59.2786430021687, lng: 15.214129232586217};
                    let zoom = 6;
                @endif
                @if(!request()->is('/'))
                    @if($restaurants->first()  )
                        let center = { lat:{!! $restaurants->first()->lat !!}, lng:{!! $restaurants->first()->lng !!} };
                        let zoom = 11;
                    @endif

                @endif

                // The map, centered at malmo
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: zoom,
                    center: center,
                });
                // call the markers
                addMarkers(map);
            }
            function addMarkers(map){
                @foreach($restaurants as $restaurant)
                new google.maps.Marker({
                    position: { lat:{!! $restaurant->lat !!}, lng:{!! $restaurant->lng !!} },
                    map:map,
                    title:"{{ $restaurant->name }}"
                });
                @endforeach
            }
        </script>

@endsection

@section('frontend')

<section class="py-8 bg-white">
    {!! Form::open(['route' => 'filter', 'class' => 'space-y-5']) !!}
        <div class="flex flex-wrap items-center justify-between w-3/4 m-auto">

            {{-- <div>
                {{ Form::select('category', $categories, ['class' => 'w-full', 'id' => 'category'])  }}
            </div> --}}

            <div>
                {{ Form::select('location', $locations, ['class' => 'w-full', 'id' => 'location']) }}
            </div>

            <div>
                {{ Form::select('category', $categories, ['class' => 'w-full', 'id' => 'category'])  }}
            </div>
            <div>
                <button class="">
                    <div class="block inline-block float-right p-4 text-blue-900 transition duration-300 ease-out transform bg-blue-400 rounded hover:bg-blue-300 hover:text-blue-800 hover:shadow-inner hover:scale-105 hover:bg-opacity-50">
                        <svg  xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 pb-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>Search
                    </div>
                </button>
            </div>
        </div>
    {!! Form::close() !!}
</section>
<section class="px-12 py-8 bg-white border-b">

<div>
  <h4 class="pb-2 mt-12 font-bold border-b border-gray-200">Latest Restaurants</h4>


    <div class="grid grid-cols-3">
{{--        restaurant wrapper--}}
        <div class="col-span-1">
        @foreach($restaurants as $restaurant)<!-- card go here -->
            <div class="relative m-3 overflow-hidden bg-white rounded shadow-md hover:shadow-lg">


                <div class="absolute top-0 p-2 mt-2  ml-2 text-xs uppercase bg-gray-200 rounded-full
                bg-secondary-100
                 text-secondary-200">
                    <time datetime="{{ $restaurant->created_at->toIso8601String() }}">{{ $restaurant->created_at->diffForHumans() }}</time>
                </div>

                <div class="absolute top-0 right-0 p-2 mt-2 mr-2 text-xs uppercase bg-gray-200 rounded-full bg-secondary-100 text-secondary-200">
                    <svg class="inline w-5" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24
                 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>{{ $restaurant->location->county->name }}, {{ $restaurant->location->name }}</span>
                </div>
                <div class="m-4 mt-16">
                    <span class="font-bold">
                     <a href="{{ route('show', ['restaurant' => $restaurant]) }}">
                        {{$restaurant->name}}
                    </a>
                    </span>
                    <span class="block text-sm text-gray-700">{{$restaurant->description}}</span>
                    <span class="block text-sm text-gray-500">{{$restaurant->categories->implode('name', ', ')}}</span>
                </div>

            </div>

            @endforeach
        </div>

{{--        map wrapper --}}

        <div id="map" class="col-span-2">


        </div>

    </div>




</div>
</section>


<section class="px-12 py-8 bg-white border-b">
    <h4 class="pb-2 mt-12 font-bold border-b border-gray-200">Counties</h4>
    <div class="mt-4 text-center">
        @foreach($counties as $county)
            <a class="inline-block p-2 m-4 text-white bg-blue-500 rounded-full" href="{{ route('county.restaurants',
            $county) }}">{{
            $county->name
            }} ({{ $county->restaurants_count }})</a>
        @endforeach
    </div>

</section>
@endsection


