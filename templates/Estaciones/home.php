<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa de Estaciones de Carga</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>
    <style>
        #map { 
            height: 500px;
            width: 100%;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
    </style>
</head>
<body>
    <h1>Mapa de Estaciones de Carga</h1>
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin="">
    </script>

    <script>
        // Inicializar el mapa centrado en una ubicación específica
        var map = L.map('map').setView([40.4168, -3.7038], 13); // Madrid, España

        // Añadir capa de tiles de OpenStreetMap
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Datos de ejemplo de estaciones de carga
        var estacionesCarga = [
            {nombre: "Estación Centro", lat: 40.4168, lng: -3.7038, tipo: "Rápida"},
            {nombre: "Estación Norte", lat: 40.4380, lng: -3.6940, tipo: "Normal"},
            {nombre: "Estación Sur", lat: 40.4000, lng: -3.7000, tipo: "Rápida"},
            {nombre: "Estación Este", lat: 40.4200, lng: -3.6700, tipo: "Normal"},
            {nombre: "Estación Oeste", lat: 40.4100, lng: -3.7300, tipo: "Rápida"}
        ];

        // Iconos personalizados para diferentes tipos de estaciones
        var iconoRapida = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        var iconoNormal = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        // Añadir marcadores para cada estación de carga
        estacionesCarga.forEach(function(estacion) {
            var icono = estacion.tipo === "Rápida" ? iconoRapida : iconoNormal;
            
            L.marker([estacion.lat, estacion.lng], {icon: icono})
                .addTo(map)
                .bindPopup(`<b>${estacion.nombre}</b><br>Tipo: ${estacion.tipo}`);
        });

        // Función para manejar clics en el mapa
        function onMapClick(e) {
            var popup = L.popup();
            popup
                .setLatLng(e.latlng)
                .setContent("Hiciste clic en el mapa en: " + e.latlng.toString())
                .openOn(map);
        }

        map.on('click', onMapClick);
    </script>
</body>
</html>