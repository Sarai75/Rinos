CREATE DATABASE Rinos;
USE Rinos;

CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    rol ENUM('admin', 'usuario') DEFAULT 'usuario',
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cascos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    marca VARCHAR(100),
    modelo VARCHAR(100),
    tipo VARCHAR(50),
    certificacion VARCHAR(100),
    descripcion TEXT,
    precio_aprox DECIMAL(10,2),
    imagen VARCHAR(255),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE accidentes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fecha DATE,
    lugar VARCHAR(200),
    descripcion TEXT,
    causa TEXT,
    lesionados INT,
    uso_casco ENUM('Sí', 'No'),
    nivel_gravedad ENUM('Baja', 'Media', 'Alta'),
    imagen_evidencia VARCHAR(255),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE faqs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    pregunta TEXT,
    respuesta TEXT,
    categoria VARCHAR(100),
    orden INT DEFAULT 0
);