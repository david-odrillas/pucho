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
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    {{-- <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW3mFNk3hZ8axt8JgOCp7a-G3OD_zPM1Y&callback=initMap"> </script>
    <script type="text/javascript">
    // class geoLocalizacion {
    //   constructor(callback){
    //     if(navigator.geolocation){
    //       navigator.geolocation.getCurrentPosition((position)=>{
    //         this.latitude = position.coords.latitude;
    //         this.longitude = position.coords.longitude;
    //         callback();
    //       });
    //     }
    //     else {
    //       console.log('no soporta geo localizacion');
    //     }
    //   }
    // }
    //
    // function initMap(){
    //   const ubicacion = new geoLocalizacion(()=>{
    //     const options = {
    //       center: {
    //         lat: ubicacion.latitude,
    //         lng: ubicacion.longitude
    //       },
    //       zoom: 18
    //     }
    //     var map = document.getElementById('map');
    //     const mapa = new google.maps.Map(map, options);
    //     document.getElementById('longitud').value = ubicacion.latitude;
    //     document.getElementById('latitud').value = ubicacion.longitude;
    //   });
    //
    // }
      let coords;
      let marker;
      initMap = function ()
      {
        navigator.geolocation.getCurrentPosition(
          function(position) {
            coords = {
              lng: position.coords.longitude,
              lat: position.coords.latitude
            };
            setMapa(coords);
          },function(error){console.log(error);}
        );
      }
      function setMapa(coords)
      {
        let map = new google.maps.Map(document.getElementById('map'),
        {
          zoom: 15,
          center: new google.maps.LatLng(coords.lat, coords.lng),
        });

        marker = new google.maps.Marker({
          map: map,
          draggable:true,
          position: new google.maps.LatLng(coords.lat, coords.lng),
        });
        marker.addListener('dragend', function(event)
        {
          document.getElementById('latitud').value = this.getPosition().lat();
          document.getElementById('longitud').value = this.getPosition().lng();
        });

      }
    </script> --}}
    @yield('script')
</body>
</html>
