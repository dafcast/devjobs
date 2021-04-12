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

    @yield('styles')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200 min-h-screen">
    
    @if(session('estado'))
        <div class="bg-green-600 p-8 text-white uppercase font-bold text-center">{{session('estado')}}</div>
    @endif

    <div id="app">
        <div class="bg-gray-800 text-white">

            <div class="container mx-auto flex items-center justify-around py-4">

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
                        
                        <a class="" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <a href="{{route('notificaciones.index')}}" class="bg-green-600 rounded-full py-1 px-2 mx-2 text-center">
                            {{ Auth::user()->unreadNotifications->count()}}
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

        <div class="bg-gray-700">
            @yield('navegacion')
        </div>

        <main class="">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
</body>
</html>
