@extends('backend')
@section('content')
    <div class="border-b-2 border-solid  border-gray-900">
        <h1 class="text-6xl text-gray-200 mb-4 inline-block">
            Categories
        </h1>

        <div class="inline-block float-right button font-bold">
            <a href="{{ route('backend.categories.create') }}">
                <svg  xmlns="http://www.w3.org/2000/svg" class="w-4 inline-block pb-1" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>Create New
            </a>
        </div>

    </div>

    <div class="grid grid-cols-5 text-gray-200 font-bold">
        <div class="col-span-1">ID</div>
        <div>Name</div>
        <div class="col-span-2">Description</div>
        <div># of restaurants</div>

        @foreach($categories as $category)
            <div class="col-span-1">{{$category->id}}</div>
            <div>{{$category->name}}</div>
            <div class="col-span-2">{{$category->description}}</div>
            <div></div>
        @endforeach
    </div>
    @endsection
