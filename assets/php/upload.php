<?php
header('Content-Type: application/json');

// Configuración
$directorioDestino = "uploads/";
$tamañoMaximo = 5 * 1024 * 1024; // 5MB

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $archivo = $_FILES['imagen'];
        
        // Validación del tamaño del archivo
        if ($archivo['size'] > $tamañoMaximo) {
            echo json_encode(["success" => false, "error" => "El archivo supera el tamaño máximo permitido de 5MB."]);
            exit;
        }

        // Validación del tipo de archivo
        $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($archivo['type'], $tiposPermitidos)) {
            echo json_encode(["success" => false, "error" => "Formato de archivo no permitido. Solo se aceptan JPG, PNG y GIF."]);
            exit;
        }

        // Crear el directorio si no existe
        if (!is_dir($directorioDestino)) {
            mkdir($directorioDestino, 0777, true);
        }

        // Generar un nombre único para el archivo
        $nombreArchivo = basename($archivo['name']);
        $rutaDestino = $directorioDestino . $nombreArchivo;

        if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
            echo json_encode(["success" => true, "path" => $rutaDestino]);
        } else {
            echo json_encode(["success" => false, "error" => "Error al mover el archivo al directorio de destino."]);
        }
    } else {
        echo json_encode(["success" => false, "error" => "No se recibió ningún archivo o hubo un error al subirlo."]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Método no permitido."]);
}
?>
