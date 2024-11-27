
-- Pollo
INSERT INTO `recetas` (`id`, `titulo`, `descripcion`, `imagen`, `id_usuario`, `id_tipo`, `tiempo_coccion` ) VALUES 
(1, 'Pollo al horno', 'Pollo asado al horno con hierbas y especias', 'pollo_horno.jpg', 1, 1, 60),
(2, 'Ensalada de pollo', 'Ensalada fresca con pollo a la parrilla y verduras', 'ensalada_pollo.jpg', 2, 1, 20),
(3, 'Pollo a la parrilla', 'Pollo marinado y asado a la parrilla con salsa especial', 'pollo_parrilla.jpg', 1, 1, 40);

-- Res
INSERT INTO `recetas` (`id`, `titulo`, `descripcion`, `imagen`, `id_usuario`, `id_tipo`, `tiempo_coccion` ) VALUES 
(4, 'Bife de res a la parrilla', 'Bife jugoso a la parrilla con un toque de sal y pimienta', 'bife_parrilla.jpg', 1, 2, 90),
(5, 'Tacos de carne', 'Tacos rellenos de carne de res sazonada con cebolla y cilantro', 'tacos_carne.jpg', 2, 2, 30),
(6, 'Estofado de res', 'Carne de res cocida lentamente con vegetales en salsa rica', 'estofado_res.jpg', 1, 2, 60);

-- Comida China
INSERT INTO `recetas` (`id`, `titulo`, `descripcion`, `imagen`, `id_usuario`, `id_tipo`, `tiempo_coccion` ) VALUES 
(7, 'Arroz frito chino', 'Arroz con vegetales, huevo y salsa de soya', 'arroz_frito.jpg', 1, 3, 45 ),
(8, 'Pollo agridulce', 'Pollo en salsa agridulce con piña y pimientos', 'pollo_agridulce.jpg', 2, 3, 40),
(9, 'Sopa won ton', 'Sopa de caldo claro con empanaditas de carne y camarones', 'sopa_wonton.jpg', 1, 3, 60);

-- Pollo
INSERT INTO `ingredientes` (`id`, `id_receta`, `ingrediente`, `cantidad`, `id_usuario`) VALUES 
(1, 1, 'Pollo', '1 entero', 1),
(2, 1, 'Aceite de oliva', '2 cucharadas', 1),
(3, 1, 'Romero', '1 ramita', 1),
(4, 1, 'Ajo', '3 dientes', 1),
(5, 2, 'Pollo', '200 gramos', 2),
(6, 2, 'Lechuga', '1 cabeza', 2),
(7, 2, 'Tomate', '2 unidades', 2),
(8, 2, 'Pepino', '1 unidad', 2),
(9, 2, 'Vinagreta', 'A gusto', 2),
(10, 3, 'Pollo', '500 gramos', 1),
(11, 3, 'Ajo', '2 dientes', 1),
(12, 3, 'Pimienta', 'A gusto', 1),
(13, 3, 'Salsa BBQ', '2 cucharadas', 1);

-- Res
INSERT INTO `ingredientes` (`id`, `id_receta`, `ingrediente`, `cantidad`, `id_usuario`) VALUES 
(14, 4, 'Bife', '2 unidades', 1),
(15, 4, 'Sal', 'A gusto', 1),
(16, 4, 'Pimienta', 'A gusto', 1),
(17, 5, 'Carne de res', '300 gramos', 2),
(18, 5, 'Cebolla', '1 unidad', 2),
(19, 5, 'Cilantro', 'A gusto', 2),
(20, 6, 'Carne de res', '500 gramos', 1),
(21, 6, 'Papa', '1 unidad', 1),
(22, 6, 'Zanahoria', '2 unidades', 1),
(23, 6, 'Salsa de tomate', '1 taza', 1);

-- Comida China
INSERT INTO `ingredientes` (`id`, `id_receta`, `ingrediente`, `cantidad`, `id_usuario`) VALUES 
(24, 7, 'Arroz', '2 tazas', 1),
(25, 7, 'Verduras mixtas', '1 taza', 1),
(26, 7, 'Huevo', '2 unidades', 1),
(27, 7, 'Salsa de soya', '2 cucharadas', 1),
(28, 8, 'Pollo', '400 gramos', 2),
(29, 8, 'Piña', '1/2 unidad', 2),
(30, 8, 'Pimientos', '2 unidades', 2),
(31, 9, 'Caldo de pollo', '500 ml', 1),
(32, 9, 'Empanaditas won ton', '12 unidades', 1),
(33, 9, 'Camarones', '200 gramos', 1);

-- Pollo
INSERT INTO `pasos` (`id`, `id_receta`, `paso_numero`, `descripcion`, `id_usuario`) VALUES 
(1, 1, 1, 'Precalentar el horno a 180°C.', 1),
(2, 1, 2, 'Sazonar el pollo con aceite de oliva, ajo picado y romero.', 1),
(3, 1, 3, 'Colocar el pollo en una bandeja para hornear y cocinar durante 1 hora o hasta que esté dorado.', 1),
(4, 2, 1, 'Cocinar el pollo a la parrilla hasta que esté bien cocido.', 2),
(5, 2, 2, 'Lavar y cortar la lechuga, tomate y pepino en trozos pequeños.', 2),
(6, 2, 3, 'Mezclar todos los ingredientes en un bol y añadir la vinagreta.', 2),
(7, 3, 1, 'Marinar el pollo con salsa BBQ y ajo picado.', 1),
(8, 3, 2, 'Cocinar el pollo a la parrilla, dándole vuelta hasta que esté bien cocido.', 1),
(9, 3, 3, 'Servir el pollo con una guarnición de vegetales.', 1);

-- Res
INSERT INTO `pasos` (`id`, `id_receta`, `paso_numero`, `descripcion`, `id_usuario`) VALUES 
(10, 4, 1, 'Precalentar la parrilla.', 1),
(11, 4, 2, 'Sazonar los bifes con sal y pimienta.', 1),
(12, 4, 3, 'Colocar los bifes en la parrilla y cocinar hasta el punto deseado.', 1),
(13, 5, 1, 'Cocinar la carne de res en sartén hasta dorarse.', 2),
(14, 5, 2, 'Picar la cebolla y cilantro.', 2),
(15, 5, 3, 'Montar los tacos con la carne, cebolla y cilantro.', 2),
(16, 6, 1, 'Cortar la carne de res en cubos.', 1),
(17, 6, 2, 'Cocinar la carne en una olla con los vegetales.', 1),
(18, 6, 3, 'Agregar la salsa de tomate y dejar cocinar hasta espesar.', 1);

-- Comida China
INSERT INTO `pasos` (`id`, `id_receta`, `paso_numero`, `descripcion`, `id_usuario`) VALUES 
(19, 7, 1, 'Cocer el arroz.', 1),
(20, 7, 2, 'Saltear las verduras en un sartén.', 1),
(21, 7, 3, 'Mezclar el arroz cocido con las verduras, el huevo y la salsa de soya.', 1),
(22, 8, 1, 'Cocinar el pollo en una sartén con aceite.', 2),
(23, 8, 2, 'Agregar los pimientos y piña a la sartén.', 2),
(24, 8, 3, 'Cocinar hasta que todo esté bien mezclado.', 2),
(25, 9, 1, 'Calentar el caldo de pollo en una olla.', 1),
(26, 9, 2, 'Agregar las empanaditas won ton y los camarones al caldo.', 1),
(27, 9, 3, 'Cocinar por 10 minutos y servir caliente.', 1);

-- Pollo
INSERT INTO `comentarios` (`id`, `id_receta`, `id_usuario`, `contenido`) VALUES 
(1, 1, 2, '¡Muy sabrosa! El pollo quedó muy jugoso.'),
(2, 2, 1, 'Me encantó la ensalada, muy fresca y saludable.'),
(3, 3, 2, 'El pollo a la parrilla quedó excelente, muy bien sazonado.');

-- Res
INSERT INTO `comentarios` (`id`, `id_receta`, `id_usuario`, `contenido`) VALUES 
(4, 4, 2, 'El bife a la parrilla quedó perfecto.'),
(5, 5, 1, 'Los tacos de carne estaban deliciosos, me encantó el toque de cilantro.'),
(6, 6, 2, 'El estofado estaba muy sabroso, la carne quedó tierna.');

-- Comida China
INSERT INTO `comentarios` (`id`, `id_receta`, `id_usuario`, `contenido`) VALUES 
(7, 7, 2, 'El arroz frito estuvo delicioso, muy sabroso y con mucho sabor.'),
(8, 8, 1, 'El pollo agridulce estaba delicioso, la combinación de piña es perfecta.'),
(9, 9, 2, 'La sopa won ton estaba excelente, muy reconfortante.');

