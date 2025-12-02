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
        // Ubicación de la ciudad (centro del mapa)
        var ubicacionCiudad = [20.67521809089044, -101.3458032268472];

        // Inicializar el mapa centrado en la ubicación de la ciudad
        var map = L.map('map').setView(ubicacionCiudad, 13);

       
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Estaciones de carga 
        var estacionesCarga = [
            {nombre: "Centro Histórico", lat: 20.67280073030827, lng: -101.34709604653206, tipo: "Rápida"}, 
            {nombre: "Plaza Cibeles", lat: 20.680420943518104, lng: -101.37994977920148, tipo: "Normal"},
            {nombre: "Centro Comercial Fragaria", lat: 20.709297021957408, lng: -101.35130831823378, tipo: "Rápida"},
            {nombre: "Parque Irekua", lat: 20.685762409146754, lng: -101.35718958973689, tipo: "Normal"}
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

        // Añadir marcador para la ubicación de la ciudad (con icono diferente)
        var iconoCiudad = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        L.marker(ubicacionCiudad, {icon: iconoCiudad})
            .addTo(map)
            .bindPopup(`<b>Ubicación de la Ciudad</b><br>Coordenadas: ${ubicacionCiudad[0].toFixed(6)}, ${ubicacionCiudad[1].toFixed(6)}`);

        // Añadir marcadores para cada estación de carga
        estacionesCarga.forEach(function(estacion) {
            var icono = estacion.tipo === "Rápida" ? iconoRapida : iconoNormal;
            
            L.marker([estacion.lat, estacion.lng], {icon: icono})
                .addTo(map)
                .bindPopup(`<b>${estacion.nombre}</b><br>Tipo: ${estacion.tipo}<br>Coordenadas: ${estacion.lat.toFixed(6)}, ${estacion.lng.toFixed(6)}`);
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