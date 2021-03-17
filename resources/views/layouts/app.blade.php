<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200 min-h-screen">
    <div id="app">
        <div class="bg-gray-800 text-white">

            <div class="container mx-auto flex items-center justify-around py-2">

                <a class="text-2xl" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <nav class="flex-1 text-right">                    
                    <!-- Authentication Links -->
                    @guest                            
                        <a class="mr-4 hover:underline hover hover:text-gray-200" href="{{ route('login') }}">{{ __('Login') }}</a>                            
                        @if (Route::has('register'))                            
                            <a class="hover:underline hover hover:text-gray-200" href="{{ route('register') }}">{{ __('Register') }}</a>                            
                        @endif
                    @else
                        
                        <a class="mr-4" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        
                        <a class="hover:underline hover hover:text-gray-200" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                                                    
                    @endguest
                </nav>
            </div>
        </div>

        <main class="">
            @yield('content')
        </main>
    </div>
</body>
</html>
