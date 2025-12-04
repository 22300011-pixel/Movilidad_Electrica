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
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background: #f8fafc;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #0f172a;
            margin-bottom: 24px;
            font-size: 1.8rem;
        }
        .container {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }
        #map { 
            height: 600px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(2,6,23,0.06);
            border: 1px solid #eef2f7;
        }
        .estaciones-list {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(2,6,23,0.06);
            border: 1px solid #eef2f7;
            padding: 18px;
            max-height: 600px;
            overflow-y: auto;
        }
        .estaciones-list h2 {
            font-size: 1rem;
            color: #0f172a;
            margin-bottom: 14px;
            font-weight: 700;
        }
        .estacion-item {
            padding: 12px;
            border-bottom: 1px solid #f1f5f9;
            cursor: pointer;
            transition: all 0.12s ease-in-out;
        }
        .estacion-item:last-child { border-bottom: none; }
        .estacion-item:hover {
            background: #f8fafc;
            border-radius: 6px;
            padding-left: 14px;
        }
        .estacion-nombre {
            font-weight: 700;
            color: #0f172a;
            font-size: 0.9rem;
        }
        .estacion-tipo {
            font-size: 0.75rem;
            color: #64748b;
            margin-top: 4px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }
        .badge {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 999px;
            font-size: 0.65rem;
            font-weight: 700;
            color: white;
            margin-top: 4px;
        }
        .badge-rapida {
             background: #16a34a; 
            }
        .badge-normal { 
            background: #2563eb; 
        }
    </style>
</head>
<body>
    <h1>Mapa de Estaciones de Carga</h1>
    <div class="container">
        <div id="map"></div>
        <div class="estaciones-list">
            <h2>Estaciones</h2>
            <div id="estaciones-container"></div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin="">
    </script>

    <script>
       
        var ubicacionCiudad = [20.67521809089044, -101.3458032268472];

   
        var map = L.map('map').setView(ubicacionCiudad, 13);

       
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

  
        var estacionesCarga = [
            {nombre: "Centro Histórico", lat: 20.67280073030827, lng: -101.34709604653206, tipo: "Rápida"}, 
            {nombre: "Plaza Cibeles", lat: 20.680420943518104, lng: -101.37994977920148, tipo: "Normal"},
            {nombre: "Centro Comercial Fragaria", lat: 20.709297021957408, lng: -101.35130831823378, tipo: "Rápida"},
            {nombre: "Parque Irekua", lat: 20.685762409146754, lng: -101.35718958973689, tipo: "Normal"}
        ];

    
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

       
        var markers = {};
        estacionesCarga.forEach(function(estacion) {
            var icono = estacion.tipo === "Rápida" ? iconoRapida : iconoNormal;
            
            var marker = L.marker([estacion.lat, estacion.lng], {icon: icono})
                .addTo(map)
                .bindPopup(`<b>${estacion.nombre}</b><br>Tipo: ${estacion.tipo}<br>Coordenadas: ${estacion.lat.toFixed(6)}, ${estacion.lng.toFixed(6)}`);
            
            markers[estacion.nombre] = marker;
        });

       
        var container = document.getElementById('estaciones-container');
        estacionesCarga.forEach(function(estacion) {
            var badgeClass = estacion.tipo === "Rápida" ? 'badge-rapida' : 'badge-normal';
            var div = document.createElement('div');
            div.className = 'estacion-item';
            div.innerHTML = `
                <div class="estacion-nombre">${estacion.nombre}</div>
                <div class="estacion-tipo">
                    <span class="badge ${badgeClass}">${estacion.tipo}</span>
                </div>
            `;
            div.addEventListener('click', function() {
                markers[estacion.nombre].openPopup();
                map.flyTo([estacion.lat, estacion.lng], 16);
            });
            container.appendChild(div);
        });

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