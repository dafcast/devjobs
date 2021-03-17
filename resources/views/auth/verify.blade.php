@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-20 text-center">

                <div class="text-2xl mb-2">{{ __('Verify Your Email Address') }}</div>

                    @if (session('resent'))
                        <div class="bg-red-200 border-l-4 border-red-700 text-red-700 w-full max-w-sm p-2 text-sm mb-4 mx-auto" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                    <p>{{ __('If you did not receive the email') }},</p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="my-3 w-full max-w-sm bg-green-600 p-2 text-gray-100 uppercase font-bold hover:bg-green-700 focus:outline-none">{{ __('click here to request another') }}</button>.
                    </form>

</div>
@endsection
