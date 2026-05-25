<?php
$conn = new mysqli("localhost", "dev_user", "1234","italikados");
if ($conn->connect_error){
die ("Error de conexion");
}
?>
