@extends('layouts.public')

@section('content')
<div class="flex justify-center items-center min-h-[60vh]">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    required autofocus
                    class="mt-1 w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input id="password" type="password" name="password"
                    required
                    class="mt-1 w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Remember Me -->
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-sm text-gray-700">Remember Me</label>
            </div>

            <div class="mb-4">
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                    Login
                </button>
            </div>

            <div class="text-center">
                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
