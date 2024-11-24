ELIMINA LA OTRA TABLA DE IMAGES SI TIENES Y CREA UNA NUEVA 
CREATE TABLE imagenes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    ruta VARCHAR(255) NOT NULL,
    tamano INT NOT NULL,
    fecha_subida TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

hay que crear una carpeta de uploads

D:\laragon\www\PARCIALES\PARCIAL_4\assets\php\uploads