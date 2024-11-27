<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Imágenes</title>
    <style>
        .galeria {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .galeria img {
            width: 200px;
            height: auto;
            border: 2px solid #ccc;
            border-radius: 5px;
            box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.2);
        }
        .formulario {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Subir y Mostrar Imágenes</h1>

    <!-- Formulario para subir imágenes -->
    <form class="formulario" action="subir_imagenes.php" method="POST" enctype="multipart/form-data">
        <label for="imagen">Selecciona una imagen:</label>
        <input type="file" name="imagen" id="imagen" accept="image/*" required>
        <button type="submit">Subir Imagen</button>
    </form>

    <!-- Sección para mostrar las imágenes -->
    <div class="galeria">
        <?php
            // Conexión a la base de datos
            $conexion = new mysqli("localhost", "root", "", "recetas");

            // Verificar conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Consultar las imágenes almacenadas
            $consulta = "SELECT ruta, nombre FROM imagenes";
            $resultado = $conexion->query($consulta);

            if ($resultado->num_rows > 0) {
                // Mostrar cada imagen
                while ($fila = $resultado->fetch_assoc()) {
                    echo '<div>';
                    echo '<img src="' . $fila['ruta'] . '" alt="' . $fila['nombre'] . '">';
                    echo '</div>';
                }
            } else {
                echo "No hay imágenes para mostrar.";
            }

            // Cerrar la conexión
            $conexion->close();
        ?>
    </div>
    
</body>
</html>
