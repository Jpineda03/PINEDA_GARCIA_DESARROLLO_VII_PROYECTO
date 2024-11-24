<?php


    require_once 'recetario.php';

    session_start();

    //hay que agregar la conexion a la base de datos
   // $conexion = new mysqli("localhost", "root", "", "biblioteca_personal");


   if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    session_start(); // Iniciar la sesión para acceder a la información del usuario

    // Verificar que el usuario está autenticado y los parámetros necesarios están presentes
    if (isset($_SESSION['user_id']) && isset($_POST['titulo']) && isset($_POST['ingredientes']) && isset($_POST['descripcion'])) {
        // Obtener los datos del formulario
        $usuario_id = $_SESSION['user_id']; // Obtener el ID del usuario desde la sesión
        $titulo = $_POST['titulo'];
        $ingredientes = $_POST['ingredientes'];
        $descripcion = $_POST['descripcion'];

        // Verificar la conexión a la base de datos
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Crear una instancia de la clase Recetario
        $recetario = new Recetario($conexion);

        // Llamar al método para guardar la receta
        $resultado = $recetario->guardarReceta($titulo, $ingredientes, $descripcion, $usuario_id);

        // Mostrar el resultado en formato JSON
        echo json_encode(["mensaje" => $resultado]);

        // Cerrar la conexión
        $conexion->close();
    } else {
        // Si faltan parámetros o el usuario no está autenticado
        echo json_encode(["error" => "Faltan parámetros o usuario no autenticado."]);
    }
} else {
    // Si no es una solicitud POST
    echo json_encode(["error" => "Este script solo acepta solicitudes GET."]);
}



?>
