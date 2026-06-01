<?php
$conn = new mysqli("localhost", "dev_user", "DevUser123!", "italikados");

if ($conn->connect_error){
    die("Error de conexion: " . $conn->connect_error);
}

echo "Conectado correctamente";
?>
