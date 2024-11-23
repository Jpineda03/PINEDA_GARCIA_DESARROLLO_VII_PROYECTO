<?php

class Recetario {
    private $conexion;

    // Constructor para recibir y almacenar la conexión a la base de datos
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

      // GUARDAR Y REGISTRA USUARIOS EN LA BASE DE DATOS
      public function guardarUsuario($nombre, $email, $contraseña) {
        // Verificar si el usuario ya existe
        $query = "SELECT id FROM usuarios WHERE email = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            return "El correo electrónico ya está registrado.";
        }

        // Insertar el usuario
        $query = "INSERT INTO usuarios (nombre, email, contraseña) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $password_hash = password_hash($contraseña, PASSWORD_BCRYPT);//ENCRIPTA LA CONTRASENA
        $stmt->bind_param("sss", $nombre, $email, $password_hash);

        if ($stmt->execute()) {
            return "Usuario registrado exitosamente.";
        } else {
            return "Error al registrar el usuario: " . $this->conexion->error;
        }
    }


    // GUARDAR RECETAS EN LA BASE DE DATOS
    public function guardarReceta($titulo, $ingredientes, $instrucciones, $autor_id) {
        $query = "INSERT INTO recetas (titulo, ingredientes, instrucciones, autor_id, fecha_creacion) VALUES (?, ?, ?, ?, NOW())";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sssi", $titulo, $ingredientes, $instrucciones, $autor_id);

        if ($stmt->execute()) {
            return "Receta guardada exitosamente.";
        } else {
            return "Error al guardar la receta: " . $this->conexion->error;
        }
    }

    // MODIFICAR RECETAS EN LA BASE DE DATOS

    public function modificarReceta($receta_id, $titulo, $descripcion, $ingredientes, $instrucciones) {
        $query = "UPDATE recetas SET titulo = ?, descripcion = ?, ingredientes = ?, instrucciones = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ssssi", $titulo, $descripcion, $ingredientes, $instrucciones, $receta_id);
    

        if ($stmt->execute()) {
            return "Receta modificada exitosamente.";
        } else {
            return "Error al modificar la receta: " . $this->conexion->error;
        }
    }
    // FILTRAR RECETAS POR TIPO
    public function filtrarRecetasPorTipo($tipo) {
        $query = "SELECT id, titulo, ingredientes, instrucciones, autor_id, fecha_creacion FROM recetas WHERE tipo = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $tipo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        $recetas = [];
        while ($receta = $resultado->fetch_assoc()) {
            $recetas[] = $receta;
        }

        if (empty($recetas)) {
            return "No se encontraron recetas de ese tipo.";
        }

        return $recetas;
    }

   // ELIMINAR RECETAS
   public function eliminarReceta($receta_id) {
    $query = "DELETE FROM recetas WHERE id = ?";
    $stmt = $this->conexion->prepare($query);
    $stmt->bind_param("i", $receta_id);

    if ($stmt->execute()) {
        return "Receta eliminada exitosamente.";
    } else {
        return "Error al eliminar la receta: " . $this->conexion->error;
    }
}
    // GUARDAR COMENTARIOS DE CADA RECETA
    public function guardarComentario($receta_id, $usuario_id, $comentario) {
        $query = "INSERT INTO comentarios (receta_id, usuario_id, comentario, fecha_comentario) VALUES (?, ?, ?, NOW())";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("iis", $receta_id, $usuario_id, $comentario);

        if ($stmt->execute()) {
            return "Comentario guardado exitosamente.";
        } else {
            return "Error al guardar el comentario: " . $this->conexion->error;
        }
    }
}
?>