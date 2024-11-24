<?php

require_once 'recetario.php'; // Ajusta la ruta según la ubicación de la clase Recetario

//FALTA AGREGAR EL CONFIG.PHP PARA QUE ACCEDA A LA BASE DE DATOS

session_start(); // Iniciar sesión para obtener el ID del usuario

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Verificar si se enviaron los parámetros necesarios
    if (isset($_SESSION['user_id']) && isset($_GET['receta_id']) && isset($_GET['comentario'])) {
        $usuario_id = $_SESSION['user_id']; // El ID del usuario desde la sesión
        $receta_id = $_GET['receta_id']; // El ID de la receta
        $comentario = $_GET['comentario']; // El comentario que se desea guardar

        // Verificar la conexión a la base de datos
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Crear una instancia de la clase Recetario
        $recetario = new Recetario($conexion);

        // Llamar al método para guardar el comentario
        $resultado = $recetario->guardarComentario($receta_id, $usuario_id, $comentario);

        // Devolver el resultado en formato JSON
        echo json_encode(["mensaje" => $resultado]);

        // Cerrar la conexión
        $conexion->close();
    } else {
        // Si falta algún parámetro o el usuario no está autenticado
        echo json_encode(["error" => "Faltan parámetros o el usuario no está autenticado."]);
    }
} else {
    // Si no es una solicitud GET
    echo json_encode(["error" => "Este script solo acepta solicitudes GET."]);
}

?>
