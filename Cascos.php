<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "seguridad_moto";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT id, marca, modelo, tipo, certificacion, descripcion, precio_aprox, imagen, fecha_registro FROM cascos";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de Cascos</title>

    <style>

        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #010a0aff; padding: 8px; text-align: left; }
        th { background-color: #830a0aff; color: #fff; }
        img { width: 70px; }
    </style>
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
     <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
            <img src="img/rinos2.png" alt="Logo" style="height: 60px; padding-left: 0px;">
            <div class="container">
                <h1 class="navbar-brand" href="index.html">
                    <img src="img/chevron-double-right.svg" alt="Logo" style="height: 20px; filter: brightness(0) invert(1); "><i>Rinos al Volante</i>
                </h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="PracticasSeguras.html">Practicas Seguras</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Cascos.php">Cascos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Normativa.html">Normativa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Accidentes.php">Accidentes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="FAQ.php">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Contacto.html">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.html"> Perfil</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

<h2>Lista de Cascos</h2>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de Cascos</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #222;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
        }

        .navbar a:hover {
            color: #00b7ff;
        }

        .nav-links {
            display: flex;
            align-items: center;
        }

        /* Tabla */
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #444; color: #fff; }
        img { width: 70px; }
    </style>
</head>

<body>

<table>
    <tr>
        <th>ID</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Tipo</th>
        <th>Certificación</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Imagen</th>
        <th>Fecha Registro</th>
    </tr>

    <?php
    if ($resultado && $resultado->num_rows > 0) {

        while ($fila = $resultado->fetch_assoc()) { ?>
            
            <tr>
                <td><?= $fila['id'] ?></td>
                <td><?= $fila['marca'] ?></td>
                <td><?= $fila['modelo'] ?></td>
                <td><?= $fila['tipo'] ?></td>
                <td><?= $fila['certificacion'] ?></td>
                <td><?= $fila['descripcion'] ?></td>
                <td>$<?= $fila['precio_aprox'] ?></td>
                <td><img src="<?= $fila['imagen'] ?>" alt="Casco"></td>
                <td><?= $fila['fecha_registro'] ?></td>
            </tr>

        <?php 
        } 

    } else { ?>

        <tr>
            <td colspan="9">No hay cascos registrados</td>
        </tr>

    <?php } ?>
</table>
 <footer class="bg-secondary text-white text-center py-4 mt-5">
        <div class="container">
            <p class="mb-0">&copy; 2025 Proyecto escolar. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
<div class="navbar">
    <div class="logo">
        <a href="#">🚦 Conducción Vial</a>
    </div>

    <div class="nav-links">
        <a href="agregar_casco.php">Agregar Casco</a>

    </div>
</div>


