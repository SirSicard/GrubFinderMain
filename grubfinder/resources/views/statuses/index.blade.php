@extends('backend')
@section('content')
    <div class="border-b-2 border-solid  border-gray-900">
        <h1 class="text-6xl text-gray-200 mb-4 inline-block">
            Statuses
        </h1>

        <div class="inline-block float-right button font-bold">
            <a href="{{ route('backend.statuses.create') }}">
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
        <div>Actions</div>

        @foreach($statuses as $status)
            <div class="col-span-1">{{$status->id}}</div>
            <div>{{$status->name}}</div>
            <div class="col-span-2">{{$status->description}}</div>
            <div>
                {!! Form::open(['route' => ['backend.statuses.destroy', $status], 'method' =>'delete']) !!}
                <div class="block inline-block float-right p-4 mt-4 mr-4 text-red-900 transition duration-300 ease-out transform bg-red-400 rounded hover:bg-red-300 hover:text-red-800 hover:shadow-inner hover:scale-105 hover:bg-opacity-50">
                    <button type="submit" class="font-bold">Delete</button>
                </div>
                {!! Form::close() !!}

                <div class="inline-block float-right font-bold button">
                    <a href="{{ route('backend.statuses.edit', $status) }}">Update</a>
                </div>

            </div>
        @endforeach
    </div>
@endsection