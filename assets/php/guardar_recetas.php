<?php
require_once 'recetario.php';
session_start();

// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "recetas");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Verificar que el usuario está autenticado y los parámetros necesarios están presentes
    if (isset($_SESSION['user_id']) && isset($_GET['titulo']) && isset($_GET['descripcion']) && isset($_GET['tipo'])) {
        // Obtener los datos de la solicitud GET
        $usuario_id = $_SESSION['user_id']; // Obtener el ID del usuario desde la sesión
        $titulo = $_GET['titulo'];
        $descripcion = $_GET['descripcion'];
        $tipo = $_GET['tipo'];  // Obtener el tipo de la receta

        // Crear una instancia de la clase Recetario
        $recetario = new Recetario($conexion);

        // Llamar al método para guardar la receta
        $resultado = $recetario->guardarReceta($titulo, $descripcion, $tipo, $usuario_id);

        // Mostrar el resultado en formato JSON
        echo json_encode(["mensaje" => $resultado]);

        // Cerrar la conexión
        $conexion->close();
    } else {
        // Si faltan parámetros o el usuario no está autenticado
        echo json_encode(["error" => "Faltan parámetros o usuario no autenticado."]);
    }
} else {
    // Si no es una solicitud GET
    echo json_encode(["error" => "Este script solo acepta solicitudes GET."]);
}
?>
