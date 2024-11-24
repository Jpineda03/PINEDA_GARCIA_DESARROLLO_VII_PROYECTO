<?php
session_start();
require_once('Recetario.php');  // Asegúrate de que este archivo existe y está bien incluido

// Implementar la conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "recetas");


// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die(json_encode(["error" => "Conexión fallida a la base de datos: " . $conexion->connect_error]));
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si se pasaron los parámetros 'nombre', 'email' y 'contraseña'
    if (isset($_POST['nombre'], $_POST['email'], $_POST['contraseña'])) {
        // Acceder a los parámetros pasados
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];

        // Crear una instancia de la clase Recetario
        $Recetario = new Recetario($conexion);

        // Llamar al método para guardar el usuario
        $mensaje = $Recetario->guardarUsuario($nombre, $email, $contraseña);


        if (json_decode($mensaje)->msg === "Usuario registrado exitosamente.") {
            $_SESSION["nombre"] = $nombre;
            $_SESSION["email"] = $email;

            // Redirigir al proyecto
            header("Location: http://localhost/PROYECTO");
            exit;
        } else {
            echo $mensaje; // Mostrar mensaje de error si no se registra
        }
    } else {
        echo json_encode(["error" => "Faltan parámetros: nombre, email o contraseña."]);
    }
} else {
    echo json_encode(["error" => "Este script solo procesa solicitudes POST."]);
}

// Cerrar la conexión
$conexion->close();
?>
