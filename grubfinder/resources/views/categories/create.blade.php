@extends('backend')
@section('content')
    <div class="border-b-2 border-solid  border-gray-900">
        <h1 class="text-6xl text-gray-200 mb-4 inline-block">
            Add New Category
        </h1>



    </div>
    {!! Form::open(['route' => 'backend.categories.store','class' => 'space-y-5']) !!}
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

        </div>
    <button class="float-right">
    <div class=" button font-bold">

            <svg  xmlns="http://www.w3.org/2000/svg" class="w-4 inline-block pb-1" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>Create New

    </div>
    </button>

    {!! Form::close() !!}
@endsection
