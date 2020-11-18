@extends('layouts.app')
@section('content')
  <section class="container">
    <div class="row">
      <div id="map" class="col-sm-6" style="height:400px">

      </div>
      <div class="col-sm-6">
        <form method="POST" action="{{ route('points.store') }}">
          @csrf
            <input type="input" class="my-2 form-control" name="latitude" id="latitud" placeholder="latitud">
            <input type="input" class="my-2 form-control" name="longitude" id="longitud" placeholder="longitud">
            <input type="input" class="my-2 form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Nombre" required autofocus>
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            <input type="input" class="my-2 form-control" name="address" id="address" placeholder="Direccion">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </section>
@endsection
@section('script')
  <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW3mFNk3hZ8axt8JgOCp7a-G3OD_zPM1Y&callback=initMap"> </script>
  <script type="text/javascript">
  let map;
  let coords;
  initMap = function ()
  {
    navigator.geolocation.getCurrentPosition(
      function(position) {
        coords = {
          lng: position.coords.longitude,
          lat: position.coords.latitude
        };
        map = new google.maps.Map(document.getElementById("map"), {
          center: coords,
          zoom: 17,
        });
        let marker = new google.maps.Marker({
          position: coords,
          map: map,
          draggable:true,
        });
        document.getElementById('latitud').value = coords.lat;
        document.getElementById('longitud').value = coords.lng;
        marker.addListener('dragend', function(event)
        {
          document.getElementById('latitud').value = this.getPosition().lat();
          document.getElementById('longitud').value = this.getPosition().lng();
        });
      },function(error){console.log(error);}
    );
  }
  </script>
@endsection
