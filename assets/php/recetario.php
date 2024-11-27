<?php

class Recetario {
    private $conexion;

    // Constructor para recibir y almacenar la conexión a la base de datos
    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

      // FUNCION PARA VALIDAR SI EL USUARIO EXISTE
    public function validarUsuario($email, $contraseña) {
        $query = "SELECT id FROM usuarios WHERE email = ? and contrasena = ?";
        
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ss", $email, $contraseña);
        $stmt->execute();
        $stmt->store_result();
      
        // Retorna true si el usuario ya existe, de lo contrario false
        return $stmt->num_rows > 0;
    }

    public function obtenerUsuario($email) {
        $query = "SELECT id, nombre, email FROM usuarios WHERE email = ?";
        
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        
        $resultado = $stmt->get_result();
        
        if ($resultado->num_rows > 0) {
            // Devuelve los datos del usuario como un arreglo asociativo
            return $resultado->fetch_assoc();
        } else {
            // Devuelve null si no encuentra el usuario
            return null;
        }
    }
    
    // GUARDAR Y REGISTRAR USUARIOS EN LA BASE DE DATOS
    public function guardarUsuario($nombre, $email, $contraseña) {
        // Validar formato del correo
        
        // Insertar el usuario en la base de datos
        $query = "INSERT INTO usuarios (nombre, email, contrasena) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($query);

        $password_hash = $contraseña;

        $stmt->bind_param("sss", $nombre, $email, $password_hash);
    
        if ($stmt->execute()) {
            return json_encode(["msg" => "Usuario registrado exitosamente."]);
        } else {
            return json_encode(["msg" => "Error al registrar el usuario: " . $stmt->error]);
        }
    }
    
    //LISTAR O FILTRAR RECETAS
    public function obtenerRecetas($tipo = null) {
        // Si se proporciona un tipo de receta, filtrar por ese tipo, de lo contrario, listar todas las recetas
        if ($tipo) {
            $query = "SELECT r.id, r.titulo as titulo, r.descripcion as descripcion, r.fecha_creacion, u.nombre as autor, p.descripcion as pasos, i.ingrediente as ingredientes, r.id_tipo as tipo
                        FROM recetas r, usuarios u, pasos p, ingredientes i
                        WHERE r.id_tipo = ? AND r.id_usuario = u.id AND r.id = p.id_receta AND r.id = i.id_receta";

            $stmt = $this->conexion->prepare($query);
            $stmt->bind_param("s", $tipo);

        } else {
            $query = "  SELECT r.id, r.titulo as titulo, r.descripcion as descripcion, r.fecha_creacion, u.nombre as autor, p.descripcion as pasos, i.ingrediente as ingredientes, r.id_tipo as tipo
                        FROM recetas r, usuarios u, pasos p, ingredientes i
                        WHERE r.id_usuario = u.id AND r.id = p.id_receta AND r.id = i.id_receta";
            $stmt = $this->conexion->prepare($query);
        }
    
        $stmt->execute();
        $resultado = $stmt->get_result();
    
        $recetas = [];
    
        // Recorrer los resultados y almacenarlos en un array
        while ($receta = $resultado->fetch_assoc()) {
            $recetas[] = $receta;
        }
    
        // Si no se encontraron recetas, retornar un mensaje adecuado
        if (empty($recetas)) {
            return "No se encontraron recetas.";
        }
    
        // Retornar las recetas encontradas
        return $recetas;
    }
    

    // GUARDAR RECETAS EN LA BASE DE DATOS
    public function guardarReceta($titulo, $descripcion, $tipo, $usuario_id) {
        $query = "INSERT INTO recetas (titulo, descripcion, id_tipo, id_usuario) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ssii", $titulo, $descripcion, $tipo, $usuario_id);
    
        if ($stmt->execute()) {
            return $this->conexion->insert_id; // Devuelve el ID recién generado
        } else {
            throw new Exception("Error al guardar la receta: " . $stmt->error);
        }
    }
      
    public function guardarIngredientes($ingredientes, $receta_id, $id_usuario) {

        $query = "INSERT INTO ingredientes (id_receta, ingrediente, cantidad, id_usuario) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $cantidad = "1";
        
        $stmt->bind_param("issi", $receta_id, $ingredientes, $cantidad, $id_usuario);

        if (!$stmt->execute()) {
            throw new Exception("Error al guardar ingredientes aqui: " . $stmt->error);
        }
    
    
        return "Ingredientes guardados correctamente.";
    }
    

    public function guardarPasos($pasos, $receta_id, $user_id) {
        $query = "INSERT INTO pasos (id_receta, paso_numero, descripcion, id_usuario) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $paso = 0;
    
        
        $stmt->bind_param("iisi", $receta_id, $paso , $pasos, $user_id);
        
        if (!$stmt->execute()) {

            throw new Exception("Error al guardar pasos: " . $stmt->error);
        }else{
            
            return "Pasos guardados correctamente.";
        }
        
    
    }
    
    public function guardarRecetaCompleta($titulo, $descripcion, $tipo, $usuario_id, $ingredientes, $pasos) {
        $this->conexion->begin_transaction(); // Inicia la transacción
    
        try {
            // Guardar la receta y obtener su ID
            $receta_id = $this->guardarReceta($titulo, $descripcion, $tipo, $usuario_id);
    
            // Guardar los ingredientes
            $this->guardarIngredientes($ingredientes, $receta_id);
    
            // Guardar los pasos
            $this->guardarPasos($pasos, $receta_id);
    
            $this->conexion->commit(); // Confirma la transacción
            return "Receta completa guardada correctamente.";
        } catch (Exception $e) {
            $this->conexion->rollback(); // Revierte en caso de error
            return "Error al guardar la receta completa: " . $e->getMessage();
        }
    }
     

    //GUARDAR IMAGENES AL CARGAR LAS RECETAS
    public function guardarImagen($receta_id, $imagen) {
        // Verificar si la imagen se subió sin errores
        if ($imagen['error'] !== UPLOAD_ERR_OK) {
            return "Error al subir la imagen.";
        }
    
        // Definir el nombre y el destino de la imagen
        $imagen_nombre = "imagen_" . time() . "." . pathinfo($imagen['name'], PATHINFO_EXTENSION);
        $directorio_destino = "uploads/";
    
        // Mover la imagen al directorio destino
        if (move_uploaded_file($imagen['tmp_name'], $directorio_destino . $imagen_nombre)) {
            // Guardar la ruta de la imagen en la base de datos
            $query = "INSERT INTO imagenes (id_receta, imagen_url) VALUES (?, ?)";
            $stmt = $this->conexion->prepare($query);
            $stmt->bind_param("is", $receta_id, $directorio_destino . $imagen_nombre);
            if ($stmt->execute()) {
                return "Imagen guardada correctamente.";
            } else {
                return "Error al guardar la imagen en la base de datos.";
            }
          
        } else {
            return "Error al mover la imagen.";
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