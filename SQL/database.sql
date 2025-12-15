CREATE DATABASE seguridad_moto;
USE seguridad_moto;

-- Usuarios
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Cascos
CREATE TABLE cascos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  marca VARCHAR(100),
  modelo VARCHAR(100),
  tipo VARCHAR(100),
  certificacion VARCHAR(100),
  descripcion TEXT,
  precio_aprox DECIMAL(10,2),
  imagen VARCHAR(255),
  fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Accidentes
CREATE TABLE accidentes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fecha DATE,
  lugar VARCHAR(255),
  descripcion TEXT,
  causa VARCHAR(255),
  lesionados INT,
  uso_casco VARCHAR(10),
  nivel_gravedad VARCHAR(50),
  imagen_evidencia VARCHAR(255)
);

-- Preguntas frecuentes
CREATE TABLE faq (
  id INT AUTO_INCREMENT PRIMARY KEY,
  pregunta VARCHAR(255),
  respuesta TEXT,
  categoria VARCHAR(100),
  orden INT
);
INSERT INTO usuarios (nombre, email, password)
VALUES ('admin', 'admin@admin.com', 'admin123');