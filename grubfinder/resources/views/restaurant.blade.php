@extends('nav')
@section('frontend')
<section class="w-11/12 m-auto bg-white ">
    <div class="grid grid-cols-2 m-6 rounded shadow-md hover:shadow-lg">
        <div class="col-span-1 m-3">
            <h2 class="m-4 h5">
                {{ $restaurant->name }}
            </h2>
            <p class="m-4 para-sm">Address: {{ $restaurant->address }}</p>
            <p class="m-4 para-sm">Phone: {{ $restaurant->phone }}</p>
            <a href="https://{{ $restaurant->website }}" class="m-4 hover:underline para-md">Website: {{ $restaurant->website }}</a>
            <p class="m-4 para-md">About: {{ $restaurant->description }}</p>
            <ul>
                @foreach($restaurant->links as $link)
                    <li>
                        <a href="{{ $link->url }}">
                        @if($link->type == "Facebook")
                            <i class="fab fa-facebook"></i>
                        @elseif($link->type == "Twitter")
                            <i class="fab fa-twitter"></i>
                        @elseif($link->type == "Youtube")
                            <i class="fab fa-youtube"></i>
                        @elseif($link->type == "Email")
                            <i class="fas fa-envelope-open"></i>
                        @endif

                       </a></li>
                @endforeach
            </ul>
            <div class="block inline-block float-left p-4 mt-2 mb-2 ml-4 text-blue-900 transition duration-300 ease-out transform bg-blue-400 rounded hover:bg-blue-300 hover:text-blue-800 hover:shadow-inner hover:scale-105 hover:bg-opacity-50">
                <a href="{{ route('home') }}">&laquo; back</a>
            </div>
        </div>
        <div class="col-span-1 m-3">
            <div class="m-4">here be map: {{ $restaurant->gmap }}</div>
        </div>
    </div>

</section>
@endsection
