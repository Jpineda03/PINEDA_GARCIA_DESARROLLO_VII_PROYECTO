--PRIMERO HAY QUE AGREGAR LA TABLA TIPOS

CREATE TABLE `tipos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

--uego inserto los tipos: 

INSERT INTO tipos (nombre) 
VALUES 
('Pollo'),
('Comida China'),
('Res');


--LUEGO MODIFICA LA TABLA DE RECETAS

ALTER TABLE recetas
ADD COLUMN imagen VARCHAR(255) DEFAULT NULL,
ADD COLUMN id_tipo INT NOT NULL,
ADD CONSTRAINT fk_id_tipo FOREIGN KEY (id_tipo) REFERENCES tipos(id) ON DELETE CASCADE;

--CON ESTE CREAMOS DOS RECETAS DE TIPO 1 = POLLO

INSERT INTO recetas (titulo, descripcion, id_usuario, id_tipo)
VALUES ('Pollo al Horno con Papas', 'Delicioso pollo al horno acompañado de papas asadas, ideal para una comida en familia.', 1, 1);

INSERT INTO pasos (id_receta, paso_numero, descripcion)
VALUES
(1, 1, 'Precalienta el horno a 180°C.'),
(1, 2, 'Lava bien las papas, córtalas en trozos medianos y sazónalas con sal, pimienta y romero.'),
(1, 3, 'Coloca las papas en una bandeja para hornear y agrégales un chorrito de aceite de oliva.'),
(1, 4, 'Sazona el pollo con sal, pimienta, ajo en polvo y un poco de aceite de oliva. Colócalo sobre las papas en la bandeja.'),
(1, 5, 'Hornea durante 1 hora o hasta que el pollo esté dorado y cocido por dentro.'),
(1, 6, 'Retira del horno, deja reposar por 5 minutos y sirve acompañado de las papas.');

INSERT INTO ingredientes (id_receta, nombre_ingrediente, cantidad)
VALUES
(1, 'Pollo entero', '1 pieza'),
(1, 'Papas', '4 piezas medianas'),
(1, 'Aceite de oliva', '3 cucharadas'),
(1, 'Romero', 'al gusto'),
(1, 'Ajo en polvo', '1 cucharadita'),
(1, 'Sal', 'al gusto'),
(1, 'Pimienta', 'al gusto');


--RECETA DOS DE TIPO 1 = POLLO

INSERT INTO recetas (titulo, descripcion, id_usuario, id_tipo)
VALUES ('Pollo en Salsa de Mostaza y Miel', 'Un plato con una deliciosa mezcla de mostaza y miel, perfecto para una cena especial.', 1, 1);

INSERT INTO pasos (id_receta, paso_numero, descripcion)
VALUES
(2, 1, 'Corta el pollo en filetes o pechugas, y sazónalos con sal, pimienta y ajo en polvo.'),
(2, 2, 'En una sartén, calienta un poco de aceite de oliva a fuego medio-alto.'),
(2, 3, 'Añade el pollo a la sartén y cocina hasta que esté dorado y cocido por completo, unos 7-8 minutos por lado.'),
(2, 4, 'En un tazón pequeño, mezcla la mostaza, la miel y un chorrito de vinagre.'),
(2, 5, 'Cuando el pollo esté cocido, vierte la mezcla de mostaza y miel sobre el pollo en la sartén. Cocina a fuego bajo por unos minutos para que la salsa espese.'),
(2, 6, 'Sirve caliente, acompañado de arroz o ensalada.');

INSERT INTO ingredientes (id_receta, nombre_ingrediente, cantidad)
VALUES
(2, 'Pollo', '4 pechugas'),
(2, 'Mostaza', '2 cucharadas'),
(2, 'Miel', '3 cucharadas'),
(2, 'Ajo en polvo', '1 cucharadita'),
(2, 'Vinagre', '1 cucharadita'),
(2, 'Aceite de oliva', '2 cucharadas'),
(2, 'Sal', 'al gusto'),
(2, 'Pimienta', 'al gusto');


