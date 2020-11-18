<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style media="screen">
          #map{
            width: 500px;
            height: 500px;
          }
        </style>

    </head>
    <body class="container">
      <section class="row">
        <div id="map" class="col-md-6 offset-col-3">

        </div>
        <div class="col-md-6">
          <form>
            <fieldset class="form-group">
              <label for="latitud">Latitud</label>
              <input type="input" class="form-control" name="latitud" id="latitud" placeholder="latitud">
            </fieldset>
            <fieldset class="form-group">
              <label for="longitud">Longitud</label>
              <input type="input" class="form-control" name="longitud" id="longitud" placeholder="longitud">
            </fieldset>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </section>
      <section class="row">

      </section>
    </body>
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
</html>
