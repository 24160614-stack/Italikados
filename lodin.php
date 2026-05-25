<?php
$user = $_POST['user'];
$pass = $_POST['pass'];
if($user == "tunumcontrol@itoaxaca.edu.mx" && $pass == "numcontrolTSO"){header("Location: admin.php");
}else{
echo "Datos incorrectos";
}
?>
<form method="POST">
Usuario:<input type="text" name="user"><br>
Contraseña: <input type="password"  name="pass"><br>
<input type="submit">
</form>
