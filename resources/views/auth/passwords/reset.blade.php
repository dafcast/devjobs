@extends('layouts.app')

@section('content')
<div class="container mx-auto">

    <div class="flex flex-col items-center mt-32">

        <div class="bg-white w-full max-w-sm shadow-md">

            <div class="bg-gray-300 text-center uppercase py-2 font-bold text-gray-700">
                {{ __('Reset Password') }}
            </div>


            <form method="POST" action="{{ route('password.update') }}" class="my-6 mx-3" novalidate>
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="flex flex-wrap">
                    <label for="email" class="text-sm text-gray-600">{{ __('E-Mail Address') }}</label>

                    
                        <input id="email" type="email" class="bg-gray-200 w-full rounded py-2 mb-3 focus:outline-none focus:ring-2 focus:ring-gray-600 @error('email') ring-2 ring-red-700 focus:ring-red-700 @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="bg-red-200 border-l-4 border-red-700 text-red-700 w-full p-2 text-sm mb-4" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>

                <div class="flex flex-wrap">
                    <label for="password" class="text-sm text-gray-600">{{ __('Password') }}</label>

                    
                        <input id="password" type="password" class="bg-gray-200 w-full rounded py-2 mb-3 focus:outline-none focus:ring-2 focus:ring-gray-600 @error('password') ring-2 ring-red-700 focus:ring-red-700 @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="bg-red-200 border-l-4 border-red-700 text-red-700 w-full p-2 text-sm mb-4" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>

                <div class="flex flex-wrap">
                    <label for="password-confirm" class="text-sm text-gray-600">{{ __('Confirm Password') }}</label>

                    
                        <input id="password-confirm" type="password" class="bg-gray-200 w-full rounded py-2 mb-3 focus:outline-none focus:ring-2 focus:ring-gray-600" name="password_confirmation" required autocomplete="new-password">

                </div>

                <div class="flex flex-wrap">

                        <button type="submit" class="my-3 w-full bg-green-600 p-2 text-gray-100 uppercase font-bold hover:bg-green-700 focus:outline-none">
                            {{ __('Reset Password') }}
                        </button>

                </div>
            </form>


        </div>
    </div>
</div>
@endsection
