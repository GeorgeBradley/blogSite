@extends('layout.app')

@section('content')
<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
       
    <form action="{{route('register')}}" method="post">
        
    
    @csrf
    <div class="mb-4">
            <label for="name" class="sr-only">Name</label>
            <input type="text" name="name" id="name" placeholder="Your name" class="@error('name') border-red-500 @enderror bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('name') }}">
        @error('name')
        <div class="text-red-500 mt-2 text-sm">
            {{$message}}
        </div>
        @enderror
        </div>
        <div class="mb-4">
            <label for="username" class="sr-only">Username</label>
            <input type="text" name="username" id="username" placeholder="Username" class="@error('username') border-red-500 @enderror bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('username')}}">
            @error('username')
        <div class="text-red-500 mt-2 text-sm">
            {{$message}}
        </div>
        @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="sr-only">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" class="@error('email') border-red-500 @enderror bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{old('email')}}">
            @error('email')
        <div class="text-red-500 mt-2 text-sm">
            {{$message}}
        </div>
        @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="password" placeholder="Choose a password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
            @error('password')
        <div class="text-red-500 mt-2 text-sm">
            {{$message}}
        </div>
        @enderror
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="sr-only">Repeat Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Choose a password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
            @error('password_confirmation')
        <div class="text-red-500 mt-2 text-sm">
            {{$message}}
        </div>
        @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded front-medimum w-full">Register</button>
    </form>
    </div>
</div>
@endsection