<?php

$conexion = new mysqli("localhost", "root", "", "recetas");

// Verificar si hubo un error al conectar
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar si se ha subido un archivo
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['imagen'])) {
    $archivo = $_FILES['imagen'];
    $nombre_archivo = $archivo['name'];
    $tipo_archivo = $archivo['type'];
    $tmp_nombre = $archivo['tmp_name'];
    $error = $archivo['error'];
    $tamano = $archivo['size'];

    // Carpeta donde se guardarán las imágenes
    $directorio = "uploads/"; // Ruta relativa
    $nombre_nuevo = uniqid() . "_" . $nombre_archivo;
    $ruta_destino = $directorio . $nombre_nuevo;

    // Guardar en la base de datos
    $query = "INSERT INTO imagenes (ruta, nombre) VALUES ('$ruta_destino', '$nombre_archivo')";


    // Crear el directorio si no existe
    if (!is_dir($directorio)) {
        mkdir($directorio, 0755, true);
    }

    // Validaciones
    if ($error !== UPLOAD_ERR_OK) {
        echo "Error al cargar el archivo.";
        exit;
    }

    $tipos_validos = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($tipo_archivo, $tipos_validos)) {
        echo "Solo se permiten imágenes JPEG, PNG o GIF.";
        exit;
    }

    $tamano_maximo = 5 * 1024 * 1024; // 5 MB
    if ($tamano > $tamano_maximo) {
        echo "El archivo es demasiado grande.";
        exit;
    }

    // Generar ruta única
    $nombre_nuevo = uniqid() . "_" . $nombre_archivo;
    $ruta_destino = $directorio . $nombre_nuevo;

    // Verificar que el archivo temporal existe
    if (!file_exists($tmp_nombre)) {
        echo "El archivo temporal no existe.";
        exit;
    }

    // Mover el archivo
    if (move_uploaded_file($tmp_nombre, $ruta_destino)) {
        // Preparar la consulta para insertar los datos en la base de datos
        $stmt = $conexion->prepare("INSERT INTO imagenes (nombre, tipo, ruta, tamano) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $nombre_archivo, $tipo_archivo, $ruta_destino, $tamano);

        if ($stmt->execute()) {
            echo "Imagen subida y guardada en la base de datos exitosamente.";
        } else {
            echo "Error al guardar en la base de datos: " . $stmt->error;
        }

        // Cerrar el statement
        $stmt->close();
    } else {
        echo "Error al mover la imagen al directorio.";
    }
} else {
    echo "No se ha enviado ninguna imagen.";
}

// Cerrar la conexión
$conexion->close();
?>
