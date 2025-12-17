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

INSERT INTO accidentes 
(fecha, lugar, descripcion, causa, lesionados, uso_casco, nivel_gravedad, imagen_evidencia)
VALUES
('2023-05-14', 
 'Avenida Central, Ciudad de México',
 'Colisión entre una motocicleta y un automóvil al cambiar de carril sin señalizar.',
 'Imprudencia del conductor del automóvil',
 1,
 'Sí',
 'Moderada',
 'accidente_moto_auto_14052023.jpg'
);
INSERT INTO accidentes 
(fecha, lugar, descripcion, causa, lesionados, uso_casco, nivel_gravedad, imagen_evidencia)
VALUES
('2022-11-03',
 'Carretera Panamericana Km 45, Perú',
 'Accidente de motocicleta por pavimento mojado; el conductor perdió el control en una curva.',
 'Condiciones climáticas adversas',
 1,
 'No',
 'Grave',
 'accidente_curva_lluvia_03112022.jpg'
);
INSERT INTO accidentes 
(fecha, lugar, descripcion, causa, lesionados, uso_casco, nivel_gravedad, imagen_evidencia)
VALUES
('2024-02-20',
 'Zona Industrial, Monterrey',
 'Choque múltiple entre dos motocicletas y un camión de carga durante hora pico.',
 'Exceso de velocidad',
 3,
 'Sí',
 'Grave',
 'choque_multiple_20022024.jpg'
);
INSERT INTO faq (pregunta, respuesta, categoria, orden)
VALUES
('¿Por qué es importante usar casco al conducir motocicleta?',
 'El casco reduce significativamente el riesgo de lesiones graves y muerte en caso de accidente, protegiendo la cabeza de impactos directos.',
 'Seguridad',
 1
);

INSERT INTO faq (pregunta, respuesta, categoria, orden)
VALUES
('¿Cuál es la velocidad recomendada para una conducción segura?',
 'Siempre se deben respetar los límites de velocidad establecidos y adaptarse a las condiciones del clima, el tráfico y la vía.',
 'Conducción segura',
 2
);

INSERT INTO faq (pregunta, respuesta, categoria, orden)
VALUES
('¿Qué equipo de protección adicional se recomienda?',
 'Además del casco, se recomienda usar guantes, chaqueta con protecciones, pantalón resistente y calzado adecuado.',
 'Equipo de protección',
 3
);

INSERT INTO faq (pregunta, respuesta, categoria, orden)
VALUES
('¿Es peligroso usar el celular mientras se conduce una motocicleta?',
 'Sí, el uso del celular reduce la atención y el tiempo de reacción, aumentando considerablemente el riesgo de accidentes.',
 'Riesgos',
 4
);

INSERT INTO faq (pregunta, respuesta, categoria, orden)
VALUES
('¿Cómo influyen las condiciones climáticas en la conducción?',
 'La lluvia, neblina o viento reducen la visibilidad y la adherencia de las llantas, por lo que se debe conducir con mayor precaución.',
 'Factores externos',
 5
);

INSERT INTO cascos 
(marca, modelo, tipo, certificacion, descripcion, precio_aprox, imagen)
VALUES
('Shoei',
 'RF-1400',
 'Integral',
 'DOT, ECE',
 'Casco integral de alta protección, diseñado para máxima seguridad en carretera y uso deportivo.',
 650.00,
 'img/shoei_rf1400.jpg'
);

INSERT INTO cascos 
(marca, modelo, tipo, certificacion, descripcion, precio_aprox, imagen)
VALUES
('LS2',
 'Advant X',
 'Abatible',
 'DOT, ECE',
 'Casco abatible versátil, ideal para ciudad y viajes largos, con visor solar integrado.',
 320.00,
 'img/ls2_advant_x.jpg'
);

INSERT INTO cascos 
(marca, modelo, tipo, certificacion, descripcion, precio_aprox, imagen)
VALUES
('Bell',
 'Custom 500',
 'Abierto',
 'DOT',
 'Casco abierto de estilo clásico, cómodo y ligero, recomendado para recorridos urbanos.',
 170.00,
 'img/bell_custom_500.jpg'
);

INSERT INTO cascos 
(marca, modelo, tipo, certificacion, descripcion, precio_aprox, imagen)
VALUES
('Fox',
 'V1',
 'Off-Road',
 'DOT, ECE',
 'Casco especializado para motocross, con gran ventilación y diseño ligero para terrenos extremos.',
 200.00,
 'img/fox_v1.jpg'
);

INSERT INTO cascos 
(marca, modelo, tipo, certificacion, descripcion, precio_aprox, imagen)
VALUES
('AGV',
 'AX9',
 'Dual Sport',
 'DOT, ECE',
 'Casco dual sport diseñado para uso mixto en carretera y off-road, con visera y mentonera reforzada.',
 520.00,
 'img/agv_ax9.jpg'
);
