-- Insertar usuarios
INSERT INTO `usuarios` (`id`, `nombre`, `email`, `contrasena`) VALUES 
(1, 'Juan Pérez', 'juan@example.com', 'password123'),
(2, 'María Gómez', 'maria@example.com', 'password456');

-- Insertar recetas
INSERT INTO `recetas` (`id`, `titulo`, `descripcion`, `imagen`, `id_usuario`, `id_tipo`) VALUES 
(1, 'Pollo al horno', 'Pollo asado al horno con hierbas y especias', 'pollo_horno.jpg', 1, 1),
(2, 'Ensalada de pollo', 'Ensalada fresca con pollo a la parrilla y verduras', 'ensalada_pollo.jpg', 2, 1);

-- Insertar ingredientes
INSERT INTO `ingredientes` (`id`, `id_receta`, `ingrediente`, `cantidad`, `id_usuario`) VALUES 
(1, 1, 'Pollo', '1 entero', 1),
(2, 1, 'Aceite de oliva', '2 cucharadas', 1),
(3, 1, 'Romero', '1 ramita', 1),
(4, 1, 'Ajo', '3 dientes', 1),
(5, 2, 'Pollo', '200 gramos', 2),
(6, 2, 'Lechuga', '1 cabeza', 2),
(7, 2, 'Tomate', '2 unidades', 2),
(8, 2, 'Pepino', '1 unidad', 2),
(9, 2, 'Vinagreta', 'A gusto', 2);

-- Insertar pasos
INSERT INTO `pasos` (`id`, `id_receta`, `paso_numero`, `descripcion`, `id_usuario`) VALUES 
(1, 1, 1, 'Precalentar el horno a 180°C.', 1),
(2, 1, 2, 'Sazonar el pollo con aceite de oliva, ajo picado y romero.', 1),
(3, 1, 3, 'Colocar el pollo en una bandeja para hornear y cocinar durante 1 hora o hasta que esté dorado.', 1),
(4, 2, 1, 'Cocinar el pollo a la parrilla hasta que esté bien cocido.', 2),
(5, 2, 2, 'Lavar y cortar la lechuga, tomate y pepino en trozos pequeños.', 2),
(6, 2, 3, 'Mezclar todos los ingredientes en un bol y añadir la vinagreta.', 2);

-- Insertar comentarios
INSERT INTO `comentarios` (`id`, `id_receta`, `id_usuario`, `contenido`) VALUES 
(1, 1, 2, '¡Muy sabrosa! El pollo quedó muy jugoso.'),
(2, 2, 1, 'Me encantó la ensalada, muy fresca y saludable.');



COMIDA CHINA

-- Insertar recetas de comida china
INSERT INTO `recetas` (`id`, `titulo`, `descripcion`, `imagen`, `id_usuario`, `id_tipo`) VALUES 
(3, 'Pollo agridulce', 'Pollo rebozado en salsa agridulce con verduras', 'pollo_agridulce.jpg', 1, 0),
(4, 'Arroz frito', 'Arroz con vegetales y pollo frito en salsa de soja', 'arroz_frito.jpg', 2, 0);

-- Insertar ingredientes para recetas chinas
INSERT INTO `ingredientes` (`id`, `id_receta`, `ingrediente`, `cantidad`, `id_usuario`) VALUES 
(10, 3, 'Pollo', '300 gramos', 1),
(11, 3, 'Pimiento rojo', '1 unidad', 1),
(12, 3, 'Cebolla', '1 unidad', 1),
(13, 3, 'Piña', '200 gramos', 1),
(14, 3, 'Salsa de soja', '3 cucharadas', 1),
(15, 3, 'Vinagre', '1 cucharada', 1),
(16, 4, 'Arroz', '2 tazas', 2),
(17, 4, 'Pollo', '200 gramos', 2),
(18, 4, 'Cebollín', '3 tallos', 2),
(19, 4, 'Huevo', '2 unidades', 2),
(20, 4, 'Salsa de soja', '2 cucharadas', 2),
(21, 4, 'Guisantes', '1/2 taza', 2);

-- Insertar pasos para recetas chinas
INSERT INTO `pasos` (`id`, `id_receta`, `paso_numero`, `descripcion`, `id_usuario`) VALUES 
(7, 3, 1, 'Cortar el pollo en trozos pequeños y pasarlos por harina.', 1),
(8, 3, 2, 'Freír el pollo en aceite caliente hasta dorar.', 1),
(9, 3, 3, 'Cortar la cebolla, pimiento y piña en trozos pequeños.', 1),
(10, 3, 4, 'Preparar la salsa mezclando salsa de soja, vinagre y azúcar.', 1),
(11, 3, 5, 'En una sartén grande, saltear las verduras y añadir el pollo frito.', 1),
(12, 3, 6, 'Verter la salsa sobre el pollo y las verduras y cocinar por 5 minutos.', 1),
(13, 4, 1, 'Cocer el arroz y reservarlo.', 2),
(14, 4, 2, 'Cortar el pollo y freírlo en aceite caliente.', 2),
(15, 4, 3, 'Batir los huevos y cocinarlos en la sartén.', 2),
(16, 4, 4, 'Añadir el arroz, el pollo, el guisante y el cebollín picado a la sartén.', 2),
(17, 4, 5, 'Sazonar con salsa de soja y cocinar durante 5 minutos.', 2);

-- Insertar comentarios para recetas chinas
INSERT INTO `comentarios` (`id`, `id_receta`, `id_usuario`, `contenido`) VALUES 
(3, 3, 2, '¡Muy sabroso! La combinación de pollo y piña es excelente.'),
(4, 4, 1, 'El arroz frito es perfecto, justo como en el restaurante chino.');
