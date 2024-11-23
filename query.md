CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE recetas (
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    id_usuario INT NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE
);

CREATE TABLE pasos (
    id INT NOT NULL AUTO_INCREMENT,
    id_receta INT NOT NULL,
    paso_numero INT NOT NULL,
    descripcion TEXT,
    PRIMARY KEY (id),
    FOREIGN KEY (id_receta) REFERENCES recetas(id) ON DELETE CASCADE
);

CREATE TABLE ingredientes (
    id INT NOT NULL AUTO_INCREMENT,
    id_receta INT NOT NULL,
    ingrediente VARCHAR(255) NOT NULL,
    cantidad VARCHAR(100),
    PRIMARY KEY (id),
    FOREIGN KEY (id_receta) REFERENCES recetas(id) ON DELETE CASCADE
);

CREATE TABLE comentarios (
    id INT NOT NULL AUTO_INCREMENT,
    id_receta INT NOT NULL,
    id_usuario INT NOT NULL,
    contenido TEXT,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (id_receta) REFERENCES recetas(id) ON DELETE CASCADE,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE
);

CREATE TABLE imagenes (
    id INT NOT NULL AUTO_INCREMENT,
    id_receta INT NOT NULL,
    imagen_url VARCHAR(255) NOT NULL,
    descripcion_imagen VARCHAR(255),
    PRIMARY KEY (id),
    FOREIGN KEY (id_receta) REFERENCES recetas(id) ON DELETE CASCADE
);
