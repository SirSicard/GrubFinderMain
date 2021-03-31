@extends('app')

@section('content')
    <div class="flex items-center justify-center w-11/12 min-h-screen m-auto bg-gray-800 md:w-4/5">

        <div class="w-full pt-8 pb-16 pl-16 pr-16 bg-gray-700 shadow-md rounded-2xl hover:shadow-lg md:w-2/3 lg:w-1/2 xl:w-2/4">

            <div class="w-20 pb-3 m-auto">
                <img src="../images/logo.png" class="w-20">
            </div>

            <!-- form start -->
            {!! Form::open(['route' => 'register','class' => 'space-y-5']) !!}
                @csrf
                <div>
                    <label for="name" class="lable font-poppins">Name</label>
                    {{ Form::text('name',null,['class' => 'input', 'id' =>'name']) }}
                    {{--                <input type="email" id="email" class="input">--}}
                    @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <label for="email" class="lable font-poppins">Email</label>
                    {{ Form::text('email',null,['class' => 'input', 'id' =>'email']) }}
                    {{--                <input type="email" id="email" class="input">--}}
                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <label for="password" class="lable font-poppins">Password</label>
                    {{ Form::password('password',['class' => 'input', 'id' =>'password']) }}
                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="lable font-poppins">Confirm Password</label>
                    {{ Form::password('password_confirmation',['class' => 'input', 'id' =>'password_confirmation']) }}

                </div>

                <input type="submit" value="Register" class="w-full font-semibold button font-poppins">

            </form>
            <!-- form end/ -->
        </div>

    </div>
@endsection
