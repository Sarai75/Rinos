CREATE DATABASE usuarios;
USE usuarios;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
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