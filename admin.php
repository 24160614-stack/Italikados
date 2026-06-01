

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$conexion = new mysqli("localhost", "dev_user", "DevUser123!", "italikados");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

/* ELIMINAR */
if(isset($_GET['eliminar'])){
    $id = $_GET['eliminar'];
    $conexion->query("DELETE FROM refracciones WHERE id=$id");
    header("Location: admin.php");
}

/* AGREGAR */
if(isset($_POST['agregar'])){
    $nombre = $_POST['nombre_producto'];
    $marca = $_POST['marca'];
    $precio = $_POST['precio'];
    $existencia = $_POST['existencia'];

    $sql = "INSERT INTO refracciones(nombre_producto,marca,precio,existencia)
            VALUES('$nombre','$marca','$precio','$existencia')";

    $conexion->query($sql);
    header("Location: admin.php");
}

/* ACTUALIZAR */
if(isset($_POST['actualizar'])){
    $id = $_POST['id'];
    $nombre = $_POST['nombre_producto'];
    $marca = $_POST['marca'];
    $precio = $_POST['precio'];
    $existencia = $_POST['existencia'];

    $sql = "UPDATE refracciones
            SET nombre_producto='$nombre',
                marca='$marca',
                precio='$precio',
                existencia='$existencia'
            WHERE id=$id";

    $conexion->query($sql);
    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Panel Administrador</title>

<style>
body{
    font-family:Arial;
    background:#f4f4f4;
    margin:20px;
}

h1{
    text-align:center;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
}

th,td{
    border:1px solid #ddd;
    padding:8px;
    text-align:center;
}

th{
    background:#007bff;
    color:white;
}

input{
    width:100%;
    padding:5px;
}

.btn{
    padding:6px 10px;
    text-decoration:none;
    color:white;
    border:none;
    cursor:pointer;
}

.editar{
    background:green;
}

.eliminar{
    background:red;
}

.agregar{
    background:blue;
}
</style>

</head>
<body>

<h1>Administración de Refacciones Italikados</h1>

<h2>Agregar Producto</h2>

<form method="POST">
    <input type="text" name="nombre_producto" placeholder="Producto" required><br><br>

    <input type="text" name="marca" placeholder="Marca" required><br><br>

    <input type="number" step="0.01" name="precio" placeholder="Precio" required><br><br>

    <input type="number" name="existencia" placeholder="Existencia" required><br><br>

    <button type="submit" name="agregar" class="btn agregar">
        Agregar Producto
    </button>
</form>

<hr>

<h2>Lista de Productos</h2>

<table>

<tr>
<th>ID</th>
<th>Producto</th>
<th>Marca</th>
<th>Precio</th>
<th>Existencia</th>
<th>Acciones</th>
</tr>

<?php

$resultado = $conexion->query("SELECT * FROM refracciones");

while($fila = $resultado->fetch_assoc()){

echo "<tr>";

echo "<form method='POST'>";

echo "<td>
<input type='hidden' name='id' value='".$fila['id']."'>
".$fila['id']."
</td>";

echo "<td>
<input type='text' name='nombre_producto'
value='".$fila['nombre_producto']."'>
</td>";

echo "<td>
<input type='text' name='marca'
value='".$fila['marca']."'>
</td>";

echo "<td>
<input type='number' step='0.01'
name='precio'
value='".$fila['precio']."'>
</td>";

echo "<td>
<input type='number'
name='existencia'
value='".$fila['existencia']."'>
</td>";

echo "<td>

<button type='submit'
name='actualizar'
class='btn editar'>
Actualizar
</button>

<a href='admin.php?eliminar=".$fila['id']."'
class='btn eliminar'>
Eliminar
</a>

</td>";

echo "</form>";

echo "</tr>";
}
?>

</table>

</body>
</html>
