<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "seguridad_moto";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT marca, modelo, tipo, certificacion, descripcion, precio_aprox, imagen FROM cascos";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Cascos</title>
    <!--Vista Tipos de Cascos (se alimenta del CRUD de Cascos)-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/styles.css">

</head>
<body id="fondo">
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
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Inicio </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="PracticasSeguras.html">Practicas Seguras</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="Cascos.php">Cascos<span class="sr-only">(current)</span></a>
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
                            <a class="nav-link" href="CONTACTOS.php">Compromiso</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.html"> Perfil</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container my-5">
        <h1 class="text-center mb-5 text-white">Tipos de cascos</h1>
        <p class="text-center lead text-white">
            El casco es una de las principales protecciones y la mas importante al momento de conducir moto, existen diferentes tipos con sus ventajas y desventajas
        </p>
        
        <div class="row justify-content-center" style="padding-top: 60px; ">
            <div class="col-md-10">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h2 class="card-title text-primary">Cascos:</h2>
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Tipo</th>
                                    <th>Certificación</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Imagen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($resultado && $resultado->num_rows > 0) {
                                    while ($fila = $resultado->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?= $fila['marca'] ?></td>
                                            <td><?= $fila['modelo'] ?></td>
                                            <td><?= $fila['tipo'] ?></td>
                                            <td><?= $fila['certificacion'] ?></td>
                                            <td><?= $fila['descripcion'] ?></td>
                                            <td>$<?= $fila['precio_aprox'] ?></td>
                                            <td><img src="<?= $fila['imagen'] ?>" alt="Casco" style="width: 100px; height: auto;"></td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No hay cascos registrados</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <div class="row justify-content-center mt-5">
                            <div class="col-md-10">
                                <div class="card shadow-lg border-0">
                                    <div class="card-body">
                                        <h2 class="card-title text-primary">Agregar un nuevo casco:</h2>
                                        <form action="agregar_casco.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="marca">Marca:</label>
                                                <input type="text" class="form-control" id="marca" name="marca" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="modelo">Modelo:</label>
                                                <input type="text" class="form-control" id="modelo" name="modelo" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tipo">Tipo:</label>
                                                <input type="text" class="form-control" id="tipo" name="tipo" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="certificacion">Certificación:</label>
                                                <input type="text" class="form-control" id="certificacion" name="certificacion" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="descripcion">Descripción:</label>
                                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="precio_aprox">Precio Aproximado:</label>
                                                <input type="number" class="form-control" id="precio_aprox" name="precio_aprox" step="0.01" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="imagen">Imagen:</label>
                                                <input type="file" class="form-control-file" id="imagen" name="imagen" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Agregar Casco</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        $conn->close();
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

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