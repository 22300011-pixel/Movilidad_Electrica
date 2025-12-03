<!DOCTYPE html>
<head>
    <title>Bienvenido al mapa de monitoreo</title>  
    <link rel="stylesheet" href="/css/dashboard.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <style>
        #map {
            width: 100%;
            height: 500px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .filter-box {
            margin-top: 15px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .filter-box h3 {
            margin: 0 0 15px 0;
            color: black;
            font-size: 18px;
            font-weight: 600;
        }

        .filters-container {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: center;
        }

        .filter-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-group label {
            color: black;
            font-weight: 500;
            margin: 0;
            font-size: 14px;
        }

        .filter-group select {
            padding: 8px 12px;
            border: none;
            border-radius: 6px;
            background: white;
            color: #333;
            font-size: 14px;
            cursor: pointer;
            min-width: 180px;
        }


        #resetFilters {
            padding: 8px 16px;
            background: white;
            color: #667eea;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        #resetFilters:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .stats-box {
            margin-top: 15px;
            padding: 12px 15px;
            background: white;
            border-radius: 8px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            font-weight: 500;
            color: #333;
        }

        .stat-item {
            display: flex;
            gap: 5px;
            align-items: center;
        }

        .stat-number {
            color: #667eea;
            font-weight: 700;
            font-size: 16px;
        }

        h2 {
            color: #333;
            font-size: 26px;
            margin: 0 0 15px 0;
            font-weight: 700;
        }
    </style>
</head>

    <!-- MAPA DE LEAFLET -->
    <h2>🗺️ Mapa de Monitoreo en Tiempo Real</h2>

    <div class="filter-box">
        <h3>Filtros de Búsqueda</h3>
        <div class="filters-container">
            <div class="filter-group">
                <label>Tipo:</label>
                <select id="typeFilter">
                    <option value="all">Todos</option>
                    <option value="estaciones">Solo Estaciones</option>
                    <option value="vehiculos">Solo Vehículos</option>
                </select>
            </div>

            <div class="filter-group">
                <label>Estado:</label>
                <select id="statusFilter">
                    <option value="all">Todos los estados</option>
                    <option value="Disponible">Disponible</option>
                    <option value="En Uso">En Uso</option>
                    <option value="Bateria Baja">Batería Baja</option>
                    <option value="En Mantenimiento">En Mantenimiento</option>
                </select>
            </div>

            <button id="resetFilters">Limpiar Filtros</button>
        </div>

        <div class="stats-box">
            <div class="stat-item">
                <span>🚗 Vehículos:</span>
                <span class="stat-number" id="totalCount">0</span>
            </div>
            <div class="stat-item">
                <span>📍 Estaciones:</span>
                <span class="stat-number" id="estacionCount">0</span>
            </div>
            <div class="stat-item">
                <span>✓ Visibles:</span>
                <span class="stat-number" id="visibleCount">0</span>
            </div>
        </div>
    </div>

    <div id="map"></div>


    <!-- CHART -->
    <script>
    document.addEventListener("DOMContentLoaded", () => {

        const ctx = document.getElementById('incomeChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Ingresos del Mes'],
                datasets: [{
                    label: 'Total ($)',
                    data: [<?= $totalIncomeMonth ?>],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
    </script>

    <!-- LEAFLET MAP SCRIPT -->
    <script>
        const map = L.map('map').setView([20.67521809089044, -101.3458032268472], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
        }).addTo(map);

        const vehiculos = <?= json_encode($vehiculos) ?>;
        const estaciones = <?= json_encode($estaciones) ?>;

        let vehicleMarkers = [];
        let stationMarkers = [];

        function loadMarkers() {
            // Limpiar marcadores existentes
            vehicleMarkers.forEach(m => map.removeLayer(m));
            stationMarkers.forEach(m => map.removeLayer(m));
            vehicleMarkers = [];
            stationMarkers = [];

            const typeFilter = document.getElementById("typeFilter").value;
            const statusFilter = document.getElementById("statusFilter").value;

            let visibleCount = 0;

            // === Estaciones ===
            if (typeFilter === "all" || typeFilter === "estaciones") {
                estaciones.forEach(st => {
                    if (!st.latitude || !st.longitude) return;

                    const marker = L.marker([st.latitude, st.longitude], {
                        title: st.name,
                        icon: L.icon({
                            iconUrl: 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48Y2lyY2xlIGN4PSIxMiIgY3k9IjEyIiByPSI4IiBmaWxsPSIjMDA3YmZmIi8+PC9zdmc+',
                            iconSize: [24, 24],
                            iconAnchor: [12, 12]
                        })
                    }).bindPopup(`
                        <strong style="color: #007bff;">📍 Estación</strong><br>
                        <strong>${st.name}</strong><br>
                        Dirección: ${st.direccion}<br>
                        Capacidad: ${st.capacidad} puntos<br>
                        Coord: ${st.latitude.toFixed(6)}, ${st.longitude.toFixed(6)}
                    `);

                    stationMarkers.push(marker);
                    marker.addTo(map);
                    visibleCount++;
                });
            }

            // === Vehículos ===
            if (typeFilter === "all" || typeFilter === "vehiculos") {
                vehiculos.forEach(v => {
                    if (!v.latitude || !v.longitude) return;

                    // Filtro de estado
                    if (statusFilter !== "all" && v.status !== statusFilter) return;

                    const statusColor = {
                        "Disponible": "#28a745",
                        "En Uso": "#dc3545",
                        "Bateria Baja": "#ffc107",
                        "En Mantenimiento": "#6c757d"
                    }[v.status] || "#999";

                    const marker = L.circleMarker([v.latitude, v.longitude], {
                        radius: 8,
                        fillColor: statusColor,
                        color: "white",
                        weight: 2,
                        opacity: 1,
                        fillOpacity: 0.8
                    }).bindPopup(`
                        <strong style="color: ${statusColor};">🚗 Vehículo</strong><br>
                        Serie: ${v.numero_de_serie}<br>
                        Modelo: ${v.model.name}<br>
                        Estado: <strong>${v.status}</strong><br>
                        Batería: ${v.battery_level}%<br>
                        Coord: ${v.latitude.toFixed(6)}, ${v.longitude.toFixed(6)}
                    `);

                    vehicleMarkers.push(marker);
                    marker.addTo(map);
                    visibleCount++;
                });
            }

            // Actualizar contadores
            document.getElementById('totalCount').textContent = vehiculos.length;
            document.getElementById('estacionCount').textContent = estaciones.length;
            document.getElementById('visibleCount').textContent = visibleCount;
        }

        // Evento de cambio en filtros
        document.getElementById("typeFilter").addEventListener("change", loadMarkers);
        document.getElementById("statusFilter").addEventListener("change", loadMarkers);

        // Botón de limpiar filtros
        document.getElementById("resetFilters").addEventListener("click", () => {
            document.getElementById("typeFilter").value = "all";
            document.getElementById("statusFilter").value = "all";
            loadMarkers();
        });

        // Cargar marcadores al iniciar
        loadMarkers();
    </script>

</body>
</html>