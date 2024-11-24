<?php

    require_once 'recetario.php';
    session_start();

    //hay que agregar la conexion a la base de datos
   // $conexion = new mysqli("localhost", "root", "", "biblioteca_personal");
   
   // Verificar que la solicitud es GET y los parámetros necesarios están presentes
   if ($_SERVER['REQUEST_METHOD'] == 'GET') {
       // Verificar que el usuario está autenticado y los parámetros necesarios están presentes
       if (isset($_SESSION['user_id']) && isset($_GET['titulo']) && isset($_GET['ingredientes']) && isset($_GET['descripcion'])) {
           // Obtener los datos de la URL
           $usuario_id = $_SESSION['user_id']; // Obtener el ID del usuario desde la sesión
           $titulo = $_GET['titulo'];
           $ingredientes = $_GET['ingredientes'];
           $descripcion = $_GET['descripcion'];
   
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
       // Si no es una solicitud GET
       echo json_encode(["error" => "Este script solo acepta solicitudes GET."]);
   }   


?>
