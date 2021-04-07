@extends('backend')
@section('content')
    <div class="border-b-2 border-gray-900 border-solid">
        <h1 class="inline-block mb-4 text-6xl text-gray-200">
            Categories
        </h1>

        <div class="inline-block float-right font-bold button">
            <a href="{{ route('backend.categories.create') }}">
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

        @foreach($categories as $category)
            <div class="col-span-1">{{$category->id}}</div>
            <div>{{$category->name}}</div>
            <div class="col-span-2">{{$category->description}}</div>
            <div>
                <div class="inline-block float-right font-bold button">
                   <a href="{{ route('backend.categories.edit', $category) }}">Update</a>
                </div>
            </div>

        @endforeach
    </div>
    @endsection
