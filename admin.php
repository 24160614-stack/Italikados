<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

/* CONEXIÓN */
$conexion = new mysqli("localhost", "dev_user", "DevUser123!", "italikados");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

/* ELIMINAR */
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $conexion->query("DELETE FROM refracciones WHERE id=$id");
    header("Location: admin.php");
    exit;
}

/* AGREGAR */
if (isset($_POST['agregar'])) {
    $nombre = $_POST['nombre_producto'];
    $marca = $_POST['marca'];
    $precio = $_POST['precio'];
    $existencia = $_POST['existencia'];

    $conexion->query("INSERT INTO refracciones (nombre_producto, marca, precio, existencia)
    VALUES ('$nombre', '$marca', '$precio', '$existencia')");

    header("Location: admin.php");
    exit;
}

/* ACTUALIZAR */
if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre_producto'];
    $marca = $_POST['marca'];
    $precio = $_POST['precio'];
    $existencia = $_POST['existencia'];

    $conexion->query("UPDATE refracciones SET
        nombre_producto='$nombre',
        marca='$marca',
        precio='$precio',
        existencia='$existencia'
        WHERE id=$id");

    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Italikados</title>

<style>
body { font-family: Arial; background:#f4f4f4; padding:20px; }
table { width:100%; border-collapse: collapse; background:white; }
th, td { border:1px solid #ddd; padding:8px; text-align:center; }
th { background:#007bff; color:white; }
.btn { padding:5px 10px; color:white; border:none; cursor:pointer; }
.editar { background:green; }
.eliminar { background:red; }
.agregar { background:blue; }
input { width:100%; padding:5px; }
</style>

</head>
<body>

<h1>Panel Administrador - Italikados</h1>

<h2>Agregar Producto</h2>

<form method="POST">
    <input type="text" name="nombre_producto" placeholder="Producto" required><br><br>
    <input type="text" name="marca" placeholder="Marca" required><br><br>
    <input type="number" step="0.01" name="precio" placeholder="Precio" required><br><br>
    <input type="number" name="existencia" placeholder="Existencia" required><br><br>

    <button class="btn agregar" type="submit" name="agregar">Agregar</button>
</form>

<hr>

<h2>Lista de Productos</h2>

<table>
<tr>
    <th>#</th>
    <th>Producto</th>
    <th>Marca</th>
    <th>Precio</th>
    <th>Existencia</th>
    <th>Acciones</th>
</tr>

<?php
$resultado = $conexion->query("SELECT * FROM refracciones");

if (!$resultado) {
    die("Error en consulta: " . $conexion->error);
}

$contador = 1;

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>";

    echo "<form method='POST'>";

    echo "<td>
        <input type='hidden' name='id' value='".$fila['id']."'>
        ".$contador."
    </td>";

    echo "<td><input type='text' name='nombre_producto' value='".$fila['nombre_producto']."'></td>";
    echo "<td><input type='text' name='marca' value='".$fila['marca']."'></td>";
    echo "<td><input type='number' step='0.01' name='precio' value='".$fila['precio']."'></td>";
    echo "<td><input type='number' name='existencia' value='".$fila['existencia']."'></td>";

    echo "<td>
        <button class='btn editar' name='actualizar'>Actualizar</button>
        <a class='btn eliminar' href='admin.php?eliminar=".$fila['id']."'>Eliminar</a>
    </td>";

    echo "</form>";

    echo "</tr>";

    $contador++;
}
?>

</table>

</body>
</html>
<!-- ACTUALIZACIÓN: PRODUCTO ELIMINADO - FECHA: 2026-06-03 - HORA: 03:24 -->