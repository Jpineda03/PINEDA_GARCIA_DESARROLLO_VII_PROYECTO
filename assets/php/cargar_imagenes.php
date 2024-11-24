<?php
require_once 'recetario.php';
session_start();

// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "recetas");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['receta_id']) && isset($_FILES['imagen'])) {
        $receta_id = $_POST['receta_id'];
        $imagen = $_FILES['imagen'];

        // Crear una instancia de la clase Recetario
        $recetario = new Recetario($conexion);

        // Llamar al método para guardar la imagen
        $mensaje = $recetario->guardarImagen($receta_id, $imagen);

        // Mostrar el resultado en formato JSON o mensaje
        echo json_encode(["mensaje" => $mensaje]);
    } else {
        echo json_encode(["error" => "Faltan parámetros en la solicitud."]);
    }
} else {
    echo json_encode(["error" => "Este script solo acepta solicitudes POST."]);
}

$conexion->close();
?>
