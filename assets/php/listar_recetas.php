<?php

session_start();
require_once('Recetario.php');  // Asegúrate de que este archivo existe y está bien incluido

// Establecer la conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "recetas");

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die(json_encode(["error" => "Conexión fallida a la base de datos: " . $conexion->connect_error]));
}

// Verificar si se hizo una solicitud GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Crear una instancia de la clase Recetario
    $recetario = new Recetario($conexion);

    // Llamar al método para listar todas las recetas
    $recetas = $recetario->listarRecetas();

    // Verificar si se encontraron recetas
    if (is_array($recetas) && !empty($recetas)) {
        // Retornar las recetas en formato JSON
        echo json_encode($recetas);
    } else {
        // Si no se encontraron recetas, mostrar un mensaje adecuado
        echo json_encode(["error" => $recetas]);  // $recetas aquí contiene el mensaje de error
    }
} else {
    echo json_encode(["error" => "Este script solo procesa solicitudes GET."]);
}

// Cerrar la conexión
$conexion->close();
?>
