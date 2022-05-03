<html lang='en'>

<head>
    <meta charset='utf-8' />
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.js'></script>

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
   integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
   crossorigin=""/>
   <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
   integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
   crossorigin=""></script>
   <script src="https://pastebin.com/raw/jVWSwZw4"></script>

   <style>
       #map { height: 100%; }
   </style>
</head>

<body> 
<div id="map"></div>
</body>

<script>
    var route = [
  [50.5, 30.5],
  [50.4, 30.6],
  [50.3, 30.7]
];
var distance = 10; // Distance in km
       var map = L.map('map').setView([46.8139, -71.2080], 13);

       L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibjRuc2giLCJhIjoiY2wya2Y4cGFkMDJxZzNvc2J1aXVzbXVvayJ9.IfFMGnp6zksFIUfRea9waQ', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoibjRuc2giLCJhIjoiY2wya2Y4cGFkMDJxZzNvc2J1aXVzbXVvayJ9.IfFMGnp6zksFIUfRea9waQ'
}).addTo(map);
var boxes = L.RouteBoxer.box(route, distance);
   </script>
</html>