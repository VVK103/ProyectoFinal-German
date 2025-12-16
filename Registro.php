<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <!--Registro de Usuarios-->
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
                        <li class="nav-item">
                            <a class="nav-link" href="Accidentes.php">Accidentes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="FAQ.php">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Contacto.html">Contacto</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="profile.html">Perfil <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card login-card shadow-lg border-0 rounded-lg">
                    <div class="card-header text-center">
                        <h2 class="mb-0">Crear una nueva cuenta</h2>
                    </div>
                    <div class="card-body p-5">
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="form-group">
                                <label for="email">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa el nombre de usuario que usaras" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                        </form>
                        <div class="mt-3 text-center">
                            <a href="http://localhost/ProyectoFinal-German/Login.php">¿Ya tienes o creaste tu cuenta? Inicia Sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <?php
    // Configura datos de conexión
$host = "localhost";
$usuario = "root";
$clave = "";
$base = "seguridad_moto";

// Crear conexión
$conexion = new mysqli($host, $usuario, $clave, $base);

// Verificar si pudo realizar la conexión.
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $correo = $_POST['email'];
    $contrasena = $_POST['password'];

    // Consulta para insertar los datos
    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sss", $usuario, $correo, $contrasena);
        if ($stmt->execute()) {
            echo "<div class='alert alert-success text-center'>¡Registro exitoso! </div>";
        } else {
            echo "<div class='alert alert-danger text-center'>Error al registrar los datos: " . $stmt->error . "</div>";
        }

        $stmt->close();
    } else {
        echo "<div class='alert alert-danger text-center'>Error en la consulta: " . $conexion->error . "</div>";
    }
}

// Cerrar conexión
$conexion->close();
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