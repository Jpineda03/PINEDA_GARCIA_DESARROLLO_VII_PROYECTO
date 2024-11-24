<?php

    session_start();
    require_once('Recetario.php');  // Asegúrate de que este archivo existe y está bien incluido

    // AQUI HAY QUE IMPLEMENTAR LA CONEXION A LA BASE DE DATOS...
    $conexion = new mysqli("localhost", "root", "", "recetas");
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Verificar si se pasaron los parámetros 'nombre', 'email' y 'contraseña' en la URL
        if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['contraseña'])) {
            // Acceder a los parámetros pasados por la URL (GET)
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT); // Encriptar la contraseña

            // Verificar si la conexión fue exitosa
            if ($conexion->connect_error) {
                die("Conexión fallida a la base de datos Recetas: " . $conexion->connect_error);
            }

            // Crear una instancia de la clase Biblioteca
            $Recetario = new Recetario($conexion);

            // Llamar al método para guardar el usuario
            $mensaje = $Recetario->guardarUsuario($nombre, $email, $contraseña);

            // Mostrar el mensaje que devuelve la función

            

            
                
            $_SESSION["nombre"]= $nombre;
            $_SESSION["email"]= $email;
            
            header("Location: http://localhost/PROYECTO");
                
         
            // Mostrar el mensaje que devuelve la función
        echo json_encode(["mensaje" => $mensaje]);

        // Cerrar la conexión después de completar la operación
        $conexion->close();
    } else {
        echo json_encode(["error" => "Faltan parámetros: nombre, email o contraseña."]);
    }
} else {
    echo json_encode(["error" => "Este script solo procesa solicitudes POST."]);
}


?>
