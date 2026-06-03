<?php
ini_set('display_errors', 0);
error_reporting(0);

$mensaje_error = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = trim($_POST['user']);
    $pass = trim($_POST['pass']);

    if($user == "24160614@itoaxaca.edu.mx" && $pass == "24160614JEN"){
        header("Location: admin.php");
        exit;
    } else {
        $mensaje_error = "⚠️ Datos incorrectos. Inténtalo de nuevo.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Italika Refacciones</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
        body{
            background-color:#0a1929;
            background-image:radial-gradient(circle at top left,#1a3b69,#0a1929 70%);
            color:white;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:20px;
        }
        .tarjeta-login{
            background:rgba(25,80,140,0.6);
            border-radius:60px 20px 80px 40px;
            padding:50px 40px;
            width:100%;
            max-width:480px;
            box-shadow:0 10px 30px rgba(0,0,0,0.3);
            border:1px solid rgba(255,255,255,0.15);
            backdrop-filter:blur(10px);
            text-align:center;
        }
        .titulo{font-size:2.8em;font-weight:900;margin-bottom:20px;color:#fff;text-shadow:0 0 15px rgba(255,255,255,0.3);}
        .subtitulo{font-size:1.1em;opacity:0.8;margin-bottom:30px;}
        .icono{font-size:5em;margin-bottom:20px;}
        .form-grupo{margin-bottom:25px;text-align:left;}
        label{display:block;margin-bottom:8px;font-size:1.1em;opacity:0.9;}
        input{
            width:100%;
            padding:15px 20px;
            background:rgba(255,255,255,0.1);
            border:1px solid rgba(255,255,255,0.2);
            border-radius:20px 10px 30px 15px;
            color:white;
            font-size:1em;
            backdrop-filter:blur(5px);
        }
        input::placeholder{color:rgba(255,255,255,0.6);}
        input:focus{outline:none;border-color:#8ab4f8;box-shadow:0 0 10px rgba(138,180,248,0.4);}
        .boton-entrar{
            width:100%;
            background:#2563eb;
            color:white;
            padding:18px;
            border:none;
            border-radius:30px 15px 40px 25px;
            font-size:1.2em;
            font-weight:bold;
            cursor:pointer;
            box-shadow:0 8px 20px rgba(0,0,0,0.25);
            transition:all 0.3s ease;
        }
        .boton-entrar:hover{transform:scale(1.03);background:#1d4ed8;}
        .error{background:rgba(220,53,69,0.2);border:1px solid rgba(220,53,69,0.4);padding:15px;border-radius:15px;margin-bottom:20px;color:#ffb3b3;}
        .regresar{margin-top:25px;display:inline-block;color:#8ab4f8;text-decoration:none;font-size:1em;opacity:0.8;}
        .regresar:hover{opacity:1;text-decoration:underline;}
        .pie{margin-top:30px;font-size:0.9em;opacity:0.6;}
    </style>
</head>
<body>
    <div class="tarjeta-login">
        <div class="icono">🔐</div>
        <h1 class="titulo">INICIO DE SESIÓN</h1>
        <p class="subtitulo">Acceso al sistema de refacciones Italika</p>

        <?php if(!empty($mensaje_error)): ?>
            <div class="error"><?= $mensaje_error ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-grupo">
                <label for="user">Usuario:</label>
                <input type="text" id="user" name="user" placeholder="Correo electrónico" required>
            </div>
            <div class="form-grupo">
                <label for="pass">Contraseña:</label>
                <input type="password" id="pass" name="pass" placeholder="Tu contraseña" required>
            </div>
            <button type="submit" class="boton-entrar">✅ ENTRAR AL SISTEMA</button>
        </form>

        <a href="index.php" class="regresar">⬅️ Regresar a la página p
