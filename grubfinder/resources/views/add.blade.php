<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>GrubFinder</title>
  </head>

  <body class="flex flex-col leading-relaxed tracking-wide gradient font-poppins">
    <!--Nav-->
    
    <nav id="header" class="top-0 z-30 w-full py-1 text-white lg:py-6">
      <!-- Grubfinder logo -->
      <div class="container flex flex-wrap items-center justify-between w-full px-2 py-2 mx-auto mt-0 lg:py-6">
        <div class="items-center pl-4">
          <a class="text-2xl font-bold text-black lg:text-4xl" href="#">
            <svg class="inline-block w-6 h-6 text-yellow-700 fill-current"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <path d="M13 8V0L8.11 5.87 3 12h4v8L17 8h-4z" />
            </svg>
            Grubfinder
          </a>
        </div>

        <!-- Search bar -->
        <div class="relative pt-2 mx-auto text-gray-600">
          <input class="h-10 px-5 pr-16 text-sm bg-white border-2 border-gray-300 rounded-lg focus:outline-none"
            type="search" name="search" placeholder="Search">
          <button type="submit" class="absolute top-0 right-0 mt-5 mr-4">
            <svg class="w-4 h-4 text-gray-600 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
              <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"></svg>
          </button>
        </div>
        <!-- End of Search bar -->

        <!-- Navbar -->
        <div class="block pr-4 lg:hidden">
          <button id="nav-toggle" class="flex items-center px-3 py-2 text-gray-500 border border-gray-600 rounded appearance-none hover:text-gray-800 hover:border-green-500 focus:outline-none">
            <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
          </button>
        </div>

        <div class="z-20 hidden w-full p-4 mt-2 text-black lg:flex lg:items-center lg:w-auto lg:block lg:mt-0 lg:p-0" id="nav-content">
          <ul class="items-center justify-end flex-1 list-reset lg:flex">
            <li class="mr-3">
              <a class="inline-block py-2 text-black hover:text-gray-800 hover:underline" href="{{ route('register') }}">Apply for admin</a>
            </li>
            <li class="mr-3">
              <a class="inline-block px-4 py-2 text-black hover:text-gray-800 hover:underline" href="index.html">Restaurant list</a>
            </li>
          </ul>
          <button id="navAction" class="px-8 py-4 mx-auto mt-4 font-extrabold text-gray-800 rounded shadow opacity-75 lg:mx-0 hover:underline lg:mt-0"><a href="{{ route('login') }}">Admin</a></button>
        </div>
        <!-- End of Navbar -->
      </div>
    </nav>
    <!-- End of nav -->
    <section class="py-8 bg-white border-b">

        <div class="border-b-2 border-gray-900 border-solid">
            <h1 class="inline-block mb-4 text-6xl text-gray-200">
                Create New Restaurant
            </h1>
    
            <ul>@foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach</ul>
    
        </div>
        {!! Form::open(['route' => 'add','class' => 'space-y-5']) !!}
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
                {{ Form::select('location_id', $locations, ['class' => 'w-full', 'id' => 'location']) }}
            </div>
            {{-- <div>
                <label for="status" class="text-gray-200">Status</label>
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
        <button class="float-right">
            <div class="font-bold button">
                <svg  xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 pb-1" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>Create New
            </div>
        </button>
    
        {!! Form::close() !!}

    </section> 
  </body>
</html>
