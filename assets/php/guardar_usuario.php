<?php

require_once('Recetario.php');  // Asegúrate de que este archivo existe y está bien incluido

  // AQUI HAY QUE IMPLEMENTAR LA CONEXION A LA BASE DE DATOS...
  //$conexion = new mysqli("localhost", "root", "", "recetas");
  $conexion = require 'D:\laragon\www\PROYECTO\config.php';

  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Verificar si se pasaron los parámetros 'nombre', 'email' y 'contraseña' en la URL
    if (isset($_GET['nombre']) && isset($_GET['email']) && isset($_GET['contraseña'])) {
        // Acceder a los parámetros pasados por la URL (GET)
        $nombre = $_GET['nombre'];
        $email = $_GET['email'];
        $contraseña = password_hash($_GET['contraseña'], PASSWORD_BCRYPT); // Encriptar la contraseña

        // Verificar si la conexión fue exitosa
        if ($conexion->connect_error) {
            die("Conexión fallida a la base de datos Recetas: " . $conexion->connect_error);
        }

        // Crear una instancia de la clase Biblioteca
        $Recetario = new Recetario($conexion);

        // Llamar al método para guardar el usuario
        $mensaje = $Recetario->guardarUsuario($nombre, $email, $contraseña);

        // Mostrar el mensaje que devuelve la función
        echo $mensaje;

        // Cerrar la conexión después de completar la operación
        $conexion->close();
    } else {
        echo "Faltan parámetros: nombre, email o contraseña.";
    }
} else {
    echo "Este script solo procesa solicitudes GET.";
}


?>
