<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet" type="text/css">

    <title>{{ config('app.name', 'Workshop') }}</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!--<script type="module" src="{{ asset('js/bootstrap.js') }}"></script>-->
    <!--<script type="module" src="{{ asset('js/vue.global.js') }}"></script>-->
    <!--<script type="module" src="{{ asset('js/app.js') }}"></script>-->
    <script src="{{ asset('build/assets/app-c75e0372.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="{{ asset('js/workshop.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <!--<link href="{{ asset('css/bootstrap.css') }}" type="text/css" rel="stylesheet">-->
    <link href="{{ asset('build/assets/app-041e359a.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/workshop.css') }}" type="text/css" rel="stylesheet">
    <style type="text/css">
        i{
            font-size: 20px !important;
            /*padding: 10px;*/
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-home"></i></a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li><a href="{{route('county/index')}}">Megyék</a></li>&nbsp;
                       </ul>
                        <ul class="navbar-nav ms-auto">
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="text-center">
            {{ config('app.name', 'Workshop') }} v{{ env('APP_VERSION') }} (PHP v{{ PHP_VERSION }})
        </footer>
    </div>
</body>
</html>
