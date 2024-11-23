<?php

require_once './Recetario.php'; // Ajusta la ruta según la ubicación de biblioteca.php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start(); // Iniciar sesión para obtener el ID del usuario

    // Verificar si se enviaron los parámetros necesarios
    if (isset($_SESSION['user_id']) && isset($_POST['receta_id']) && isset($_POST['comentario'])) {
        $usuario_id = $_SESSION['user_id']; // El ID del usuario desde la sesión
        $receta_id = $_POST['receta_id']; // El ID de la receta
        $comentario = $_POST['comentario']; // El comentario que se desea guardar

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
    // Si no es una solicitud POST
    echo json_encode(["error" => "Este script solo acepta solicitudes POST."]);
}
