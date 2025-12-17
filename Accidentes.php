<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/styles.css">
    <script src="JS/script.js"></script>
</head>
<body id="fondo">

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
            <img src="img/rinos2.png" alt="Rinos" style="height: 60px; margin-right: 12px;">
            <div class="container">
                <h1 class="navbar-brand" href="index.html">
                    <img src="img/chevron-double-right.svg" alt="Logo" style="height: 20px; filter: brightness(0) invert(1); "><i>Rinos al Volante</i>
                </h1>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="PracticasSeguras.html">Prácticas Seguras</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Cascos.php">Cascos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Normativa.html">Normativa</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="Accidentes.php">Accidentes <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="FAQ.php">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="CONTACTOS.php">Compromiso</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Perfil.html">Perfil</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


     <main class="container my-5">
        <h1 class="text-white text-center">TIPOS DE ACCIDENTES EN MOTO</h1>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/accidentes1.jpg" style="whidth:80%; height:60%;"
        class="d-block w-100" alt="Aciidentes 1">
    </div>
    <div class="carousel-item">
      <img src="img/accidentes2.jpg" style="whidth:80%; height:60%;"
      class="d-block w-100" alt="accidente 2">
    </div>
    <div class="carousel-item">
      <img src="img/accidentes3.jpg" style="whidth:80%; height:60%;"
      class="d-block w-100" alt="accidente 3">
    </div>
    <div class="carousel-item">
      <img src="img/accidentes4.jpg" style="whidth:80%; height:60%;"
      class="d-block w-100" alt="accidente 4">
    </div>
    <div class="carousel-item">
      <img src="img/accidentes5.jpg" style="whidth:80%; height:60%;"
      class="d-block w-100" alt="accidente 5">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
     

        <div class="row justify-content-center" style="padding-top: 60px; ">
            <div class="col-md-10">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h2 class="card-title text-primary">Conduccion Segura</h2>
                        <p>
                          Cada vez que tomas el volante, no solo llevas un vehículo: llevas vidas. Las imágenes que ves no son escenas lejanas ni 
                          irreales; son el resultado de decisiones tomadas en segundos que pueden cambiarlo todo para siempre.<br>
                          El exceso de velocidad, el uso del celular, no respetar las señales o conducir bajo los efectos del alcohol son causas frecuentes de accidentes 
                          que dejan heridas, pérdidas y familias marcadas para siempre. Ningún mensaje es tan urgente, ningún destino es tan importante como llegar con vida.
                        </p>
                    </div>
                </div>
            </div>
        </div>

     <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seguridad_moto";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de accidentes
$sql = "SELECT id, fecha, lugar, descripcion, causa, lesionados, uso_casco, nivel_gravedad FROM accidentes";
$result = $conn->query($sql);
?>


    <h2 class="text-white mt-5">Listado de Accidentes</h2>
    <div class="container mt-4">
        <div class="card bg-light shadow-lg">
            <div class="card-body">
                <table class="table table-bordered table-striped table-accidentes">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Lugar</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Causa</th>
                            <th class="text-center">Lesionados</th>
                            <th class="text-center">Uso de Casco</th>
                            <th class="text-center">Nivel de Gravedad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result && $result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td class="text-center"><?php echo htmlspecialchars($row["id"]); ?></td>
                                    <td class="text-center"><?php echo htmlspecialchars($row["fecha"]); ?></td>
                                    <td class="text-center"><?php echo htmlspecialchars($row["lugar"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["descripcion"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["causa"]); ?></td>
                                    <td class="text-center"><?php echo htmlspecialchars($row["lesionados"]); ?></td>
                                    <td class="text-center"><?php echo $row["uso_casco"] ? "Sí" : "No"; ?></td>
                                    <td class="text-center"><?php echo htmlspecialchars($row["nivel_gravedad"]); ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center text-muted">No hay datos disponibles</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </main>
<?php
// Cerrar conexión
$conn->close();
?>


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
