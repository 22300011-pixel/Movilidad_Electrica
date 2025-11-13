CREATE TABLE IF NOT EXISTS users (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,         
    password VARCHAR(64) NOT NULL,                
    email VARCHAR(50) NOT NULL UNIQUE,             
    nombre VARCHAR(100),                            
    apellidos VARCHAR(100),  
	rol ENUM('Cliente', 'Administrador') NOT NULL DEFAULT 'Cliente',
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS metodo_de_pagos (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    tipo_de_tarjeta ENUM('Creidto', 'Debito') NOT NULL,
    nombre_del_titular VARCHAR(100) NOT NULL,
    cvv VARCHAR(4) NOT NULL,
    fecha_de_vencimiento VARCHAR(5) NOT NULL,
    es_predeterminado TINYINT(1) NOT NULL DEFAULT 0,
    alias VARCHAR(50),
    user_id INTEGER,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP
) ;

CREATE TABLE IF NOT EXISTS promociones (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(50) NOT NULL,
    porcentaje_de_descuento DECIMAL(5, 2) NOT NULL,
    fecha_de_expiracion DATE,
    activa TINYINT(1) NOT NULL DEFAULT 1,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP
) ;

CREATE TABLE IF NOT EXISTS estaciones (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    direccion TEXT NOT NULL,
    latitud DECIMAL(10, 8) NOT NULL,
    longitud DECIMAL(11, 8) NOT NULL,
    capacidad INTEGER,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP
) ;

CREATE TABLE IF NOT EXISTS modelos (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nombre_del_modelo VARCHAR(100) NOT NULL,
    marca VARCHAR(100) NOT NULL,
    tipo_de_vehiculo VARCHAR(100) NOT NULL,
    tarifa_por_minuto DECIMAL(8, 2) NOT NULL,
    capacidad_maxima_kg INTEGER,
    capacidad_de_bateria INTEGER,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP
) ;

CREATE TABLE IF NOT EXISTS vehiculos (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    numero_de_serie VARCHAR(100) NOT NULL,
    estado ENUM('Disponible', 'En Uso', 'Bateria Baja', 'En Mantenimiento') NOT NULL DEFAULT 'Disponible',
    nivel_de_bateria INTEGER NOT NULL DEFAULT 100,
    latitud DECIMAL(10, 8) NOT NULL,
    longitud DECIMAL(11, 8) NOT NULL,
    estacion_id INTEGER,
    modelo_id INTEGER,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP
) ;

CREATE TABLE IF NOT EXISTS viajes (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    hora_inicio DATETIME NOT NULL,
    hora_fin DATETIME NOT NULL,
    costo_total DECIMAL(10, 2) DEFAULT 0.00,
    estado_viaje ENUM('En Curso', 'Completado') NOT NULL DEFAULT 'En Curso',
    user_id INTEGER,
    vehiculo_id INTEGER,
    metodo_de_pago_id INTEGER,
    estacion_id INTEGER,
    promocion_id INTEGER,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP
) ;

CREATE TABLE IF NOT EXISTS fotos (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    url_foto VARCHAR(255) NOT NULL,
    descripcion VARCHAR(255),
    modelo_id INTEGER,
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP
) ;