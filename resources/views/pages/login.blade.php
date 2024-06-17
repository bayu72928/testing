@extends('layouts.landing')
@section('content')
    <div class="container">
        <div class=" rounded-lg shadow-lg mx-auto justify-center grid grid-cols-2 h-4/5 w-4/5 bg-gray-300">
            <div class="rounded-lg p-16">
                <h1 class="font-bold font-sans text-5xl">Sign In</h1>
                <form action="/login" method="POST">
                    <div class="block py-20">
                        @csrf
                        <label class="mt-4 w-96 mx-auto block text-left" for="uname">Username</label>
                        <input class="transition ease-linear my-4 mx-auto block w-96 py-2 pl-1 pr-5 border-b-2 bg-gray-300 border-gray-50 hover:border-gray-500 focus:border-gray-500 outline-none" type="text" name="username" id="" placeholder="Enter Username" required>
                        <label class="mt-8 w-96 mx-auto block text-left" for="pass">Password</label>
                        <input class="transition ease-linear my-4 mx-auto block w-96 py-2 pl-1 pr-5 border-b-2 bg-gray-300 border-gray-50 hover:border-gray-500 focus:border-gray-500 outline-none" type="password" name="password" id="" placeholder="Enter Password" required>
                        <input class="transition ease-linear cursor-pointer rounded-lg shadow-md mt-10 font-medium text-lg block mx-auto w-96 bg-blue-700 text-white py-4 hover:bg-blue-600" type="submit" value="Sign In">
                    </div>
                </form>
            </div>
            <img class="my-6 -ml-6 rounded-lg shadow-lg" src="{{asset('images/logo-color.png')}}" alt="">
        </div>
    </div>
@endsection