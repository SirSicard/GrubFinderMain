@extends('nav')
@section('frontend')

<section class="py-8 bg-white">
    {!! Form::open(['route' => 'filter', 'class' => 'space-y-5']) !!}
    <div class="flex grid w-3/4 grid-cols-3 m-auto">

        <div>
            {{ Form::select('location', $locations, ['class' => 'w-full', 'id' => 'location']) }}
        </div>
  

        <div>
            {{ Form::select('category', $categories, ['class' => 'w-full', 'id' => 'category'])  }}
        </div>


    <button class="float-right">
        <div class="font-bold button">
            <svg  xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 pb-1" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>Search
        </div>
    </button>
  </div>
    {!! Form::close() !!}
</section>
<section class="px-12 py-8 bg-white border-b">   

<div>
  <h4 class="pb-2 mt-12 font-bold border-b border-gray-200">Latest Restaurants</h4>
  
    <div class="grid gap-10 mt-8 lg:grid-cols-3 md:grid-cols-2 ">
          
      @foreach($restaurants as $restaurant)<!-- card go here -->
        <div class="relative overflow-hidden bg-white rounded shadow-md hover:shadow-lg">
            <img src="https://picsum.photos/600/600?random&grayscale" alt="" class="object-cover object-center w-full h-48 sm:h-48">
            <div class="m-4">
                <span class="font-bold">{{$restaurant->name}}</span>
            <span class="block text-sm text-gray-700">{{$restaurant->description}}</span>
                <span class="block text-sm text-gray-500">{{$restaurant->categories->implode('name', ', ')}}</span>
            </div>
            <div class="absolute top-0 p-2 mt-2 ml-2 text-xs uppercase bg-gray-200 rounded-full bg-secondary-100 text-secondary-200">
                <span>{{$restaurant->updated_at}}</span>
            </div>
        </div>
        @endforeach 
    </div>
    
</div>
</section> 
@endsection
