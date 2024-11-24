<?php
    session_start();
    require_once('recetario.php'); // Asegúrate de incluir la clase Recetario

    // Crear la conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "recetas");

    // Verificar si la conexión es exitosa
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Crear una instancia de la clase Recetario
    $recetario = new Recetario($conexion);

    // Verificar si los datos fueron enviados por POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recoger los datos del formulario
       
        $email = $_POST['email'] ?? null;
        $contraseña = $_POST['contraseña'] ?? null;

       
        // Verificar si el usuario existe
        if ($recetario->validarUsuario($email, $contraseña)) {
            
            $usuario = $recetario->obtenerUsuario($email);
            
            $_SESSION["id_usuario"]= $usuario['id'];
            $_SESSION["nombre"]= $usuario['nombre'];
            $_SESSION["email"]= $usuario['email'];
            
            $conexion->close();

            echo json_encode(["status" => "Usuario validado, iniciando sesión."]);
           

        } 
        header("Location: http://localhost/PROYECTO");

    } else {
        echo json_encode(["error" => "Método no permitido."]);
        $conexion->close();
    }

?>
