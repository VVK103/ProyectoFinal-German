<?php
// CONEXIÓN
$conexion = new mysqli("localhost", "root", "", "seguridad_vial");
if ($conexion->connect_error) {
    die("Error de conexión");
}

// GUARDAR
if (isset($_POST['guardar'])) {
    $img = $_FILES['imagen']['name'];
    $ruta = "img/accidentes/" . $img;
    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

    $sql = "INSERT INTO accidentes
    (fecha,lugar,descripcion,causa,lesionados,uso_casco,nivel_gravedad,imagen_evidencia)
    VALUES (
    '{$_POST['fecha']}',
    '{$_POST['lugar']}',
    '{$_POST['descripcion']}',
    '{$_POST['causa']}',
    '{$_POST['lesionados']}',
    '{$_POST['uso_casco']}',
    '{$_POST['nivel_gravedad']}',
    '$img')";

    $conexion->query($sql);
}

// ELIMINAR
if (isset($_GET['eliminar'])) {
    $conexion->query("DELETE FROM accidentes WHERE id=".$_GET['eliminar']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Accidentes</title>
<style>
{
    box-sizing: border-box;
}

body {
    margin: 0;
    min-height: 100vh;
    font-family: 'Segoe UI', Arial, sans-serif;
    background: linear-gradient(135deg, #3a0d0d, #1a0a0a);
    display: flex;
    justify-content: center;
    align-items: center;
    color: #2b1b14;
}

.container {
    width: 95%;
    max-width: 1100px;
    background: #f3e7dc;
    padding: 35px;
    border-radius: 20px;
    box-shadow: 0 25px 60px rgba(0,0,0,0.6);
}

/* TITULOS */
h1, h2 {
    text-align: center;
    color: #6b0f1a;
    margin-bottom: 20px;
    letter-spacing: 1px;
}

/* FORMULARIO */
form {
    background: #e6d3c3;
    padding: 25px;
    border-radius: 15px;
    margin-bottom: 40px;
}

input, select, textarea {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border-radius: 10px;
    border: 2px solid #b08968;
    font-size: 15px;
    background: #fffaf6;
    color: #2b1b14;
}

input::placeholder,
textarea::placeholder {
    color: #7a5c48;
}

input:focus,
select:focus,
textarea:focus {
    outline: none;
    border-color: #6b0f1a;
    box-shadow: 0 0 8px rgba(107,15,26,0.4);
}

/* BOTON */
button {
    width: 100%;
    padding: 14px;
    margin-top: 10px;
    border: none;
    border-radius: 12px;
    background: linear-gradient(135deg, #8b0000, #6b0f1a);
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: transform .2s, box-shadow .2s, background .2s;
}

button:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(107,15,26,0.6);
    background: linear-gradient(135deg, #a30000, #7a1420);
}

/* TABLA */
table {
    width: 100%;
    border-collapse: collapse;
    overflow: hidden;
    border-radius: 15px;
}

th {
    background: #6b0f1a;
    color: #fff;
    padding: 15px;
    text-transform: uppercase;
    font-size: 14px;
}

td {
    padding: 14px;
    text-align: center;
    background: #fdf6ef;
    border-bottom: 1px solid #d6b8a0;
}

tr:nth-child(even) td {
    background: #f0dfcf;
}

tr:hover td {
    background: #e7cdb7;
}

/* LINK ELIMINAR */
a {
    color: #8b0000;
    font-weight: bold;
    text-decoration: none;
}

a:hover {
    color: #3a0d0d;
    text-decoration: underline;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .container {
        padding: 20px;
    }

    th, td {
        font-size: 13px;
        padding: 10px;
    }
}

</style>
</head>

<body>
<div class="container">

<h1>Registrar Accidente</h1>

<form method="POST" enctype="multipart/form-data">
    <input type="date" name="fecha" required>
    <input type="text" name="lugar" placeholder="Lugar" required>
    <textarea name="descripcion" placeholder="Descripción" required></textarea>
    <input type="text" name="causa" placeholder="Causa" required>
    <input type="number" name="lesionados" placeholder="Lesionados" required>

    <select name="uso_casco" placeholder="uso casco">
        <option>SI</option>
        <option>NO</option>
    </select>

    <select name="nivel_gravedad" placeholder="gravedad">
        <option>LEVE</option>
        <option>MODERADO</option>
        <option>GRAVE</option>
        <option>FATAL</option>
    </select>

    <input type="file" name="imagen">
    <button name="guardar">Guardar</button>
</form>

<h2>Lista de Accidentes</h2>

<table>
<tr>
<th>Fecha</th>
<th>Lugar</th>
<th>Gravedad</th>
<th>Casco</th>
<th>Acción</th>
</tr>

<?php
$res = $conexion->query("SELECT * FROM accidentes");
while ($row = $res->fetch_assoc()) {
?>
<tr>
<td><?= $row['fecha'] ?></td>
<td><?= $row['lugar'] ?></td>
<td><?= $row['nivel_gravedad'] ?></td>
<td><?= $row['uso_casco'] ?></td>
<td>
<a href="?eliminar=<?= $row['id'] ?>">Eliminar</a>
</td>
</tr>
<?php } ?>

</table>
</div>
</body>
</html>
