<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "seguridad_moto";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $tipo = $_POST['tipo'];
    $certificacion = $_POST['certificacion'];
    $descripcion = $_POST['descripcion'];
    $precio_aprox = $_POST['precio_aprox'];

    // Manejo de la imagen
    $imagen = $_FILES['imagen'];
    $imagenNombre = $imagen['name'];
    $imagenTmp = $imagen['tmp_name'];
    $imagenCarpeta = "img/" . $imagenNombre;

    // Mover la imagen a la carpeta de destino
    if (move_uploaded_file($imagenTmp, $imagenCarpeta)) {
        // Insertar datos en la base de datos
        $sql = "INSERT INTO cascos (marca, modelo, tipo, certificacion, descripcion, precio_aprox, imagen) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $marca, $modelo, $tipo, $certificacion, $descripcion, $precio_aprox, $imagenCarpeta);

        if ($stmt->execute()) {
            echo "<script>alert('Casco agregado exitosamente.'); window.location.href = 'Cascos.php';</script>";
        } else {
            echo "<script>alert('Error al agregar el casco: " . $stmt->error . "'); window.history.back();</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Error al subir la imagen.'); window.history.back();</script>";
    }
}

$conn->close();
?>
