<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/e78d417062.js" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ url('/style.css') }}" />

        
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <a class="navbar-brand" href="{{ url('/weather-api') }}">{{ config('app.name', 'Laravel') }}</a>
            
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/weather-api/by-date') }}">Search by Date 
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/weather-api') }}">Predefined Cities
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>

                <form id="search-form" class="form-inline my-2 my-lg-0" method="GET" action="{{ url('/get-city-weather') }}">
                    <input id="search-box" class="form-control mr-sm-2" type="search"  name="search-location" placeholder="Search City" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <div class="container">
            @yield('content')

        </div>
    </body>
</html>
