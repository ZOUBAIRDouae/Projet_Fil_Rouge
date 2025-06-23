@extends('layouts.public')

@section('content')
<div class="flex justify-center items-center min-h-[60vh]">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Verify Your Email Address</h2>

        @if (session('resent'))
            <div class="mb-4 text-sm text-green-600 text-center">
                A new verification link has been sent to your email address.
            </div>
        @endif

        <p class="mb-4 text-gray-700 text-center">
            Before proceeding, please check your email for a verification link.
            If you did not receive the email,
        </p>

        <form method="POST" action="{{ route('verification.resend') }}" class="text-center">
            @csrf
            <button type="submit" class="text-sm text-blue-600 hover:underline">
                click here to request another
            </button>
        </form>
    </div>
</div>
@endsection
