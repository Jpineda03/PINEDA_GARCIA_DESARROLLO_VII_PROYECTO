<?php
require_once('recetario.php'); // Asegúrate de incluir la clase Recetario

// Crear la conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "biblioteca_personal");

// Verificar si la conexión es exitosa
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Crear una instancia de la clase Recetario
$recetario = new Recetario($conexion);

// Verificar si los datos fueron enviados por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    // Validar el correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["error" => "El parámetro email es requerido y debe ser una dirección de correo válida."]);
        exit;
    }

    // Verificar si el usuario existe
    if ($recetario->validarUsuario($email)) {
        echo json_encode(["status" => "Usuario encontrado, iniciando sesión."]);
    } else {
        // Si el usuario no existe, guardarlo
        $resultado = $recetario->guardarUsuario($nombre, $email, $contraseña);

        // Responder al usuario
        if ($resultado == "Usuario registrado exitosamente.") {
            echo json_encode(["status" => "Usuario creado exitosamente, iniciando sesión."]);
        } else {
            echo json_encode(["error" => $resultado]);
        }
    }
} else {
    echo json_encode(["error" => "Método no permitido."]);
}
?>
