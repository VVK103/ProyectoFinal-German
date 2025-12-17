<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!--Vista Preguntas Frecuentes (FAQ) (se alimenta del CRUD de Accidentes)-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/styles.css">
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
                        <li class="nav-item">
                            <a class="nav-link" href="Accidentes.php">Accidentes</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="FAQ.php">FAQ<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="CONTACTOS.php">Compromiso</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.html">Perfil </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container my-5">
        <h1 class="text-center mb-5 text-white">Preguntas Frecuentes</h1>
        <p class="text-center lead text-white">
            Estas son preguntas que se han hecho y podemos responder
        </p>
        
        <div class="row justify-content-center" style="padding-top: 60px; ">
            <div class="col-md-10">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h2 class="card-title text-primary">Preguntas:</h2>
                        <?php
                        $host = "localhost";
                        $user = "root";
                        $pass = "";
                        $db = "seguridad_moto";

                        $con = new mysqli($host, $user, $pass, $db);

                        if ($con->connect_error) {
                            die("Error de conexion: " . $con->connect_error);
                        }

                        $sql = "SELECT pregunta, respuesta, categoria, orden FROM faq";
                        $res = $con->query($sql);

                        if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) {

                                echo "<p><b>Pregunta:</b> " . $row['pregunta'] . "</p>";
                                echo "<p><b>Respuesta:</b> " . $row['respuesta'] . "</p>";
                                echo "<p><b>Categoria:</b> " . $row['categoria'] . "</p>";
                                echo "<p><b>Orden:</b> " . $row['orden'] . "</p>";
                                echo "<hr>";
                            }
                        } else {
                            echo "<p>No hay preguntas registradas.</p>";
                        }

                        $con->close();
                        ?>
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
