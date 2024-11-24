<?php

require_once 'recetario.php';

session_start(); // Iniciar la sesión al comienzo del archivo

if (!isset($_SESSION['id_usuario'])) {
    $_SESSION['id_usuario'] = 2; // Simular un usuario autenticado
}

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "recetas");

// Verificar si la conexión a la base de datos fue exitosa
if ($conexion->connect_error) {
    die(json_encode(["error" => "Conexión fallida: " . $conexion->connect_error]));
}

// Verificar si el método de solicitud es GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Verificar que los parámetros necesarios están presentes
    if (isset($_SESSION['id_usuario'], $_GET['titulo'], $_GET['descripcion'], $_GET['id_tipo'], $_GET['ingrediente'], $_GET['paso_numero'])) {
        // Obtener los datos del formulario
        $usuario_id = $_SESSION['id_usuario'];
        $titulo = trim($_GET['titulo']);
        $descripcion = trim($_GET['descripcion']);
        $tipo = trim($_GET['id_tipo']);
        $ingredientes = json_decode($_GET['ingrediente'], true); // Decodificar el JSON de ingredientes
        $pasos = json_decode($_GET['paso_numero'], true); // Decodificar el JSON de pasos

        // Crear una instancia de la clase Recetario
        $recetario = new Recetario($conexion);

        // Guardar la receta y obtener el ID de la receta guardada
        $receta_id = $recetario->guardarReceta($titulo, $descripcion, $tipo, $usuario_id);

        // Verificar si la receta se guardó correctamente
        if (is_numeric($receta_id)) {
            // Guardar los ingredientes
            $resultadoIngredientes = $recetario->guardarIngredientes($ingredientes, $receta_id);
            
            // Guardar los pasos
            $resultadoPasos = $recetario->guardarPasos($pasos, $receta_id);

            // Mostrar el resultado en formato JSON
            echo json_encode(["mensaje" => "Receta, ingredientes y pasos guardados correctamente.", "ingredientes" => $resultadoIngredientes, "pasos" => $resultadoPasos]);
        } else {
            echo json_encode(["error" => "Error al guardar la receta: " . $receta_id]);
        }
    } else {
        // Si faltan parámetros o el usuario no está autenticado
        echo json_encode(["error" => "Faltan parametros o usuario no autenticado."]);
    }
} else {
    // Si no es una solicitud GET
    echo json_encode(["error" => "Este script solo acepta solicitudes GET."]);
}


?>
