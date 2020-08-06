<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') . ' | Tracking '}}</title>
        
        <script>
            var SERVER = "@php echo env('APP_URL', 'http://localhost') @endphp";
        </script>

        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&API_KEY=AIzaSyCqHv8O7voNW4xRlfglo1hH1gw5Ey8hUh0"></script> 
        <script type="text/javascript"> 
            var geocoder;

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
            } 
            //Get the latitude and the longitude;
            function successFunction(position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                codeLatLng(lat, lng)
            }

            function errorFunction(){
                alert("Geocoder failed");
            }

            function initialize() {
                geocoder = new google.maps.Geocoder();



            }

            function codeLatLng(lat, lng) {

                var latlng = new google.maps.LatLng(lat, lng);
                geocoder.geocode({'latLng': latlng}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                console.log(results)
                    if (results[1]) {
                    //formatted address
                    alert(results[0].formatted_address)
                    //find country name
                        for (var i=0; i<results[0].address_components.length; i++) {
                        for (var b=0;b<results[0].address_components[i].types.length;b++) {

                        //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                            if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                                //this is the object you are looking for
                                city= results[0].address_components[i];
                                break;
                            }
                        }
                    }
                    //city data
                    alert(city.short_name + " " + city.long_name)


                    } else {
                    alert("No results found");
                    }
                } else {
                    alert("Geocoder failed due to: " + status);
                }
                });
            }
        </script>         
    </head>
    <body onload="initialize()" class="nav-fixed">

   
        
    </body>
</html>
