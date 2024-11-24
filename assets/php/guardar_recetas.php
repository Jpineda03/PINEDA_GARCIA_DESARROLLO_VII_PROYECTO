<?php

require_once 'recetario.php';

session_start(); // Iniciar la sesión al comienzo del archivo

// Verificar que la sesión se ha iniciado correctamente
if (!isset($_SESSION['id_usuario'])) {
    echo json_encode(["error" => "La sesión no está iniciada o el 'id_usuario' no está definido."]);
    exit(); // Detener la ejecución si no hay sesión
}

// Simular sesión activa (solo para pruebas)
//if (!isset($_SESSION['id_usuario'])) {
   // $_SESSION['id_usuario'] = 1; // Simular usuario autenticado
//}

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "recetas");

// Verificar si la conexión a la base de datos fue exitosa
if ($conexion->connect_error) {
    die(json_encode(["error" => "Conexión fallida: " . $conexion->connect_error]));
}

// Verificar si el método de solicitud es GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Verificar que los parámetros necesarios están presentes
    if (isset($_SESSION['id_usuario'], $_GET['titulo'], $_GET['descripcion'], $_GET['id_tipo'])) {
        // Obtener los datos del formulario
        $usuario_id = $_SESSION['id_usuario'];
        $titulo = trim($_GET['titulo']);
        $descripcion = trim($_GET['descripcion']);
        $tipo = trim($_GET['id_tipo']);

        // Depuración: Verificar que los parámetros han llegado correctamente
        error_log("ID Usuario: " . $usuario_id);
        error_log("Titulo: " . $titulo);
        error_log("Descripción: " . $descripcion);
        error_log("Tipo: " . $tipo);

        // Crear una instancia de la clase Recetario
        $recetario = new Recetario($conexion);

        // Llamar al método para guardar la receta
        $resultado = $recetario->guardarReceta($titulo, $descripcion, $tipo, $usuario_id);

        // Mostrar el resultado en formato JSON
        echo json_encode(["mensaje" => $resultado]);

    } else {
        // Si faltan parámetros o el usuario no está autenticado
        echo json_encode(["error" => "Faltan parámetros o usuario no autenticado."]);
    }
} else {
    // Si no es una solicitud GET
    echo json_encode(["error" => "Este script solo acepta solicitudes GET."]);
}

// Cerrar la conexión
$conexion->close();

?>
