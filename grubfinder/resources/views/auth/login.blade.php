@extends('app')

@section('content')
<div class="flex items-center justify-center w-11/12 min-h-screen m-auto bg-gray-800 md:w-4/5">

    <div class="w-full pt-8 pb-16 pl-16 pr-16 bg-gray-700 shadow-md rounded-2xl hover:shadow-lg md:w-2/3 lg:w-1/2 xl:w-2/4">

        <div class="w-20 pb-3 m-auto">
            <img src="../images/logo.png" class="w-20">
        </div>

        <!-- form start -->
        <form action="" class="space-y-5">

            <div>
                <label for="email" class="lable font-poppins">Email</label>
                <input type="email" id="email" class="input">
            </div>

            <div>
                <label for="password" class="lable font-poppins">Password</label>
                <input type="password" id="password" class="input">
            </div>

            <div>
                <a href="#" class="ml-2 text-xs text-gray-400  hover:text-green-800">Forgot password?</a>
            </div>

            <input type="submit" value="Log in" class="w-full font-semibold button font-poppins">

        </form>
        <!-- form end/ -->
    </div>

</div>
@endsection
