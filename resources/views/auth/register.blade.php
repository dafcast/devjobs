@extends('layouts.app')

@section('content')
<div class="container mx-auto flex flex-wrap pt-32 items-center max-w-2xl">

    <div class="md:w-1/2 flex flex-col items-center mx-auto order-2 md:order-1">

        <div class="bg-white w-full max-w-sm shadow-md">

            <div class="bg-gray-300 uppercase text-center py-2">
                {{ __('Register') }}
            </div>

            <form method="POST" action="{{ route('register') }}" class="my-6 mx-3" novalidate>
                @csrf

                <div class="flex flex-wrap">
                    <label for="name" class="text-sm text-gray-600">{{ __('Name') }}</label>

                    <input id="name" type="text" class="bg-gray-200 w-full rounded py-2 mb-3 focus:outline-none focus:ring-2 focus:ring-gray-600 @error('name') ring-2 ring-red-700 focus:ring-red-700 @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                    @error('name')
                        <span class="bg-red-200 border-l-4 border-red-700 text-red-700 w-full p-2 text-sm mb-4" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="flex flex-wrap">
                    <label for="email" class="text-sm text-gray-600">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email" class="bg-gray-200 w-full rounded py-2 mb-3 focus:outline-none focus:ring-2 focus:ring-gray-600 @error('email') ring-2 ring-red-700 focus:ring-red-700 @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                    @error('email')
                        <span class="bg-red-200 border-l-4 border-red-700 text-red-700 w-full p-2 text-sm mb-4" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="flex flex-wrap">
                    <label for="password" class="text-sm text-gray-600">{{ __('Password') }}</label>


                    <input id="password" type="password" class="bg-gray-200 w-full rounded py-2 mb-3 focus:outline-none focus:ring-2 focus:ring-gray-600 @error('password') ring-2 ring-red-700 focus:ring-red-700 @enderror" name="password" autocomplete="new-password">

                    @error('password')
                        <span class="bg-red-200 border-l-4 border-red-700 text-red-700 w-full p-2 text-sm mb-4" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="flex flex-wrap">
                    <label for="password-confirm" class="text-sm text-gray-600">{{ __('Confirm Password') }}</label>

                    <input id="password-confirm" type="password" class="bg-gray-200 w-full rounded py-2 mb-3 focus:outline-none focus:ring-2 focus:ring-gray-600" name="password_confirmation" autocomplete="new-password">

                </div>

                <div class="">
                    <button type="submit" class="my-3 w-full bg-green-600 p-2 text-gray-100 uppercase font-bold hover:bg-green-700 focus:outline-none">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>

        </div>
    </div>

    <div class="md:w-1/2 text-center mx-auto px-2 order-1 mb-10 md:order-2">
        <h2 class="text-green-700 text-3xl mb-2">¿Eres reclutador?</h2>
        <p>Crea una cuenta totalmente gratis y comienza a publicar hasta 10 vacantes</p>
    </div>

</div>
@endsection
