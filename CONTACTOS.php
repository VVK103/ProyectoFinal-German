<?php
$isSecure = (
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || (!empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)
    || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')
);

$confirmed = $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm']);
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Confirmar Conexión</title>
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
                        <li class="nav-item">
                            <a class="nav-link" href="FAQ.php">FAQ</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="CONTACTOS.php">Compromiso<span class="sr-only">(current)</span></a>
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
        <h1 class="text-center mb-5 text-white">Reglas fundamentales de una conducción segura</h1>
        <p class="text-center lead text-white">
          La conducción segura no depende solo de conocer las normas de tránsito; también implica valores como respeto, responsabilidad y convivencia vial. 
          A continuación se presentan las reglas esenciales y los valores que todo conductor debe practicar para proteger su vida y la de los demás.
        </p>
        
        <div class="row justify-content-center" style="padding-top: 60px; ">
            <div class="col-md-10">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h2 class="card-title text-primary">Conduccion Segura</h2>
                        <?php if ($isSecure): ?>
                          <p style="color:green;">Se ha establecido una conexión segura.</p>
                        <?php else: ?>
                          <p >La conducción segura no depende solo de conocer las normas de tránsito; también implica valores como respeto, responsabilidad y convivencia vial. A continuación se presentan las reglas esenciales y los valores que todo conductor debe practicar para proteger su vida y la de los demás.</p>

                          <h2>Reglas fundamentales de una conducción segura</h2>
                          <ul>
                            <li><strong>Respetar los límites de velocidad:</strong> Conducir a una velocidad adecuada reduce el riesgo de accidentes y permite reaccionar a tiempo ante cualquier imprevisto.</li>
                            <li><strong>Usar siempre el cinturón de seguridad:</strong> Tanto el conductor como todos los pasajeros deben llevarlo abrochado durante todo el trayecto.</li>
                            <li><strong>Evitar el uso del celular:</strong> No se debe manipular el teléfono mientras se conduce; la distracción es una de las principales causas de accidentes.</li>
                            <li><strong>No conducir bajo los efectos del alcohol o drogas:</strong> Estas sustancias disminuyen la capacidad de reacción y ponen en peligro a todos los usuarios de la vía.</li>
                            <li><strong>Mantener una distancia prudente:</strong> Dejar espacio suficiente con el vehículo de adelante permite frenar sin riesgo de colisión.</li>
                            <li><strong>Respetar señales y semáforos:</strong> Las señales de tránsito existen para organizar la circulación y prevenir accidentes.</li>
                            <li><strong>Revisar el vehículo periódicamente:</strong> Un auto en buen estado mecánico reduce fallas inesperadas.</li>
                          </ul>

                          <h2>Valores esenciales para una conducción responsable</h2>
                          <ul>
                            <li><strong>Responsabilidad:</strong> Conducir implica tomar decisiones que afectan la vida propia y la de otros; ser responsable es cumplir las normas y actuar con prudencia.</li>
                            <li><strong>Respeto:</strong> Respetar a peatones, ciclistas, motociclistas y otros conductores crea un ambiente vial más seguro y armonioso.</li>
                            <li><strong>Paciencia:</strong> La prisa genera errores; mantener la calma evita maniobras peligrosas y reduce el estrés al volante.</li>
                            <li><strong>Empatía:</strong> Comprender que todos compartimos la vía ayuda a actuar con consideración y evitar conflictos.</li>
                            <li><strong>Honestidad:</strong> Reconocer errores, asumir consecuencias y no intentar evadir responsabilidades fortalece la seguridad vial.</li>
                            <li><strong>Solidaridad:</strong> Ayudar a otros usuarios de la vía en situaciones de emergencia demuestra humanidad y compromiso social.</li>
                          </ul>
                        <?php endif; ?>

                        <?php if ($confirmed): ?>
                          <p>Confirmación recibida. Gracias.</p>
                        <?php else: ?>
                          <form method="post" action="">
                            <button type="submit" name="confirm" class="btn-primary">Confirmar</button>
                          </form>
                        <?php endif; ?>
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