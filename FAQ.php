<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!--Vista Preguntas Frecuentes (FAQ) (se alimenta del CRUD de Accidentes)-->
</head>
<body>

<h1>Preguntas Frecuentes</h1>
<p>Estas son preguntas que vienen del CRUD de accidentes.</p>

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "accidentes_db";

$con = new mysqli($host, $user, $pass, $db);

if ($con->connect_error) {
    die("Error de conexion: " . $con->connect_error);
}

$sql = "SELECT pregunta, respuesta FROM accidentes";
$res = $con->query($sql);

if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {

        echo "<p><b>Pregunta:</b> " . $row['pregunta'] . "</p>";
        echo "<p><b>Respuesta:</b> " . $row['respuesta'] . "</p>";
        echo "<hr>";
    }
} else {
    echo "<p>No hay preguntas registradas.</p>";
}

$con->close();
?>

</body>
</html>
