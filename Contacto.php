<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!--Vista Contacto / Compromiso de Conducción Segura-->
</head>
<body>
    <h1>Contacto</h1>
<p>Envía tus dudas o tu compromiso de ser un conductor seguro.</p>

<form method="post">
    <p>Nombre:</p>
    <input type="text" name="nombre">

    <p>Correo:</p>
    <input type="email" name="correo">

    <p>Mensaje:</p>
    <textarea name="mensaje"></textarea>

    <p>Compromiso de Conducción Segura:</p>
    <label>
        <input type="checkbox" name="compromiso" value="Si me comprometo">
        Me comprometo a conducir de forma responsable
    </label>

    <br><br>
    <button type="submit">Enviar</button>
</form>

<?php
if ($_POST) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    if (isset($_POST['compromiso'])) {
        $compromiso = $_POST['compromiso'];
    } else {
        $compromiso = "No marcó el compromiso";
    }

    echo "<h2>Datos recibidos:</h2>";
    echo "<p><b>Nombre:</b> $nombre</p>";
    echo "<p><b>Correo:</b> $correo</p>";
    echo "<p><b>Mensaje:</b> $mensaje</p>";
    echo "<p><b>Compromiso:</b> $compromiso</p>";
}
?>

</body>
</html>
