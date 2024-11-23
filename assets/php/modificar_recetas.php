<?php
    require_once('./Recetario.php');

    // HAY QUE INCLUIR LA CONEXION A LA DB
    //$conexion = new mysqli("localhost", "root", "", "biblioteca_personal");

   
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        session_start(); // Iniciar sesión para obtener el ID del usuario
    
        // Verificar si se enviaron todos los parámetros necesarios
        if (isset($_SESSION['user_id']) && isset($_GET['id']) && isset($_GET['titulo']) && isset($_GET['descripcion']) && isset($_GET['ingredientes']) && isset($_GET['instrucciones'])) {
            $usuario_id = $_SESSION['user_id']; // El ID del usuario desde la sesión
            $receta_id = $_GET['id']; // El ID de la receta que se va a modificar
            $titulo = $_GET['titulo'];
            $descripcion = $_GET['descripcion'];
            $ingredientes = $_GET['ingredientes'];
            $instrucciones = $_GET['instrucciones'];
    
            // Verificar la conexión a la base de datos
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }
    
            // Crear una instancia de la clase Recetario
            $recetario = new Recetario($conexion);
    
            // Llamar al método para modificar la receta
            $resultado = $recetario->modificarReceta($receta_id, $titulo, $descripcion, $ingredientes, $instrucciones);
    
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
