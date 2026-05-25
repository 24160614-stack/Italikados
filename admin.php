<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

// ✅ CONEXIÓN CON TU USUARIO dev_user (NO root)
$servidor = "localhost";
$usuario = "dev_user"; // TU USUARIO PARA CRUD
$clave = "Audit*2026"; // ← PON AQUÍ SU CONTRASEÑA
$base = "italikados";


$conn = mysqli_connect($servidor, $usuario, $clave, $base);
mysqli_set_charset($conn, "utf8mb4");
if (!$conn) {
    die("<div style='color:red; padding:20px; background:white; border-radius:10px; text-align:center; font-size:20px;'>❌ ERROR DE CONEXIÓN: " . mysqli_connect_error() . "</div>");
}

$mensaje = "";

// ➕ AGREGAR REFACCIÓN
if (isset($_POST['agregar'])) {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $cantidad = (int)$_POST['cantidad'];
    $precio = (float)$_POST['precio'];

    $sql = "INSERT INTO refracciones (nombre, cantidad, precio) VALUES ('$nombre', $cantidad, $precio)";
    if (mysqli_query($conn, $sql)) {
        $mensaje = "<div style='color:green; padding:15px; background:rgba(255,255,255,0.2); border-radius:10px; text-align:center;'>✅ Refacción agregada correctamente</div>";
    } else {
        $mensaje = "<div style='color:red; padding:15px; background:rgba(255,255,255,0.2); border-radius:10px; text-align:center;'>❌ ERROR: " . mysqli_error($conn) . "</div>";
    }
}

// ✏️ MODIFICAR REFACCIÓN
if (isset($_POST['modificar'])) {
    $id = (int)$_POST['id_refraccion'];
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $cantidad = (int)$_POST['cantidad'];
    $precio = (float)$_POST['precio'];

    $sql = "UPDATE refracciones SET nombre='$nombre', cantidad=$cantidad, precio=$precio WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        $mensaje = "<div style='color:orange; padding:15px; background:rgba(255,255,255,0.2); border-radius:10px; text-align:center;'>✏️ Refacción modificada correctamente</div>";
    } else {
        $mensaje = "<div style='color:red; padding:15px; background:rgba(255,255,255,0.2); border-radius:10px; text-align:center;'>❌ ERROR: " . mysqli_error($conn) . "</div>";
    }
}

// 🗑️ ELIMINAR REFACCIÓN
if (isset($_POST['eliminar'])) {
    $id = (int)$_POST['id_refraccion'];
    $sql = "DELETE FROM refracciones WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        $mensaje = "<div style='color:#ff6b6b; padding:15px; background:rgba(255,255,255,0.2); border-radius:10px; text-align:center;'>🗑️ Refacción eliminada correctamente</div>";
    } else {
        $mensaje = "<div style='color:red; padding:15px; background:rgba(255,255,255,0.2); border-radius:10px; text-align:center;'>❌ ERROR: " . mysqli_error($conn) . "</div>";
    }
}

// 📋 OBTENER DATOS
$resultado = mysqli_query($conn, "SELECT * FROM refracciones ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administración Refacciones Italika</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:Arial,sans-serif;}
        body{background:linear-gradient(135deg,#0066cc,#0099ff);padding:20px;min-height:100vh;}
        .contenedor{max-width:1200px;margin:0 auto;}
        .tarjeta{background:rgba(255,255,255,0.15);border-radius:20px;padding:30px;margin-bottom:25px;box-shadow:0 8px 32px rgba(0,0,0,0.2);backdrop-filter:blur(10px);color:white;}
        h1,h2{text-align:center;margin-bottom:25px;text-shadow:1px 1px 3px rgba(0,0,0,0.3);}
        .form-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:15px;align-items:end;}
        input{padding:12px 15px;border:none;border-radius:12px;font-size:16px;background:rgba(255,255,255,0.2);color:white;outline:none;}
        input::placeholder{color:#e0e0e0;}
        .btn{padding:12px 20px;border:none;border-radius:12px;font-weight:bold;cursor:pointer;transition:.3s;font-size:15px;}
        .btn-agregar{background:#28c76f;color:white;}
        .btn-agregar:hover{background:#21a85b;}
        .btn-modificar{background:#ff9f43;color:white;}
        .btn-modificar:hover{background:#e08936;}
        .btn-eliminar{background:#ea5455;color:white;}
        .btn-eliminar:hover{background:#d13b3c;}
        .btn-actualizar{background:#0097e6;color:white;}
        .btn-actualizar:hover{background:#0077b6;}
        table{width:100%;border-collapse:collapse;margin-top:20px;background:rgba(255,255,255,0.1);border-radius:15px;overflow:hidden;}
        th,td{padding:15px;text-align:center;border-bottom:1px solid rgba(255,255,255,0.1);}
        th{background:rgba(0,0,0,0.2);font-weight:bold;}
        tr:hover{background:rgba(255,255,255,0.05);}
    </style>
</head>
<body>

<div class="contenedor">

    <div class="tarjeta">
        <h1>⚙️ ADMINISTRACIÓN DE REFACCIONES</h1>
        <p style="text-align:center; font-size:18px; opacity:0.9;">Sistema de Inventario Italika</p>
    </div>

    <?php echo $mensaje; ?>

    <!-- AGREGAR -->
    <div class="tarjeta">
        <h2>➕ Agregar Nueva Refacción</h2>
        <form method="POST" class="form-grid">
            <input type="text" name="nombre" placeholder="Nombre de refacción" required>
            <input type="number" name="cantidad" placeholder="Cantidad" min="1" required>
            <input type="number" name="precio" placeholder="Precio $" step="0.01" min="0" required>
            <button type="submit" name="agregar" class="btn btn-agregar">✅ Agregar</button>
        </form>
    </div>

    <!-- MODIFICAR / ELIMINAR -->
    <div class="tarjeta">
        <h2>✏️ Modificar o Eliminar Refacción</h2>
        <form method="POST" class="form-grid">
            <input type="number" name="id_refraccion" placeholder="ID de la Refacción" min="1" required>
            <input type="text" name="nombre" placeholder="Nuevo Nombre">
            <input type="number" name="cantidad" placeholder="Nueva Cantidad" min="1">
            <input type="number" name="precio" placeholder="Nuevo Precio $" step="0.01" min="0">
            <button type="submit" name="modificar" class="btn btn-modificar">✏️ Modificar</button>
            <button type="submit" name="eliminar" class="btn btn-eliminar" onclick="return confirm('¿Seguro que quieres eliminar esta refacción?')">🗑️ Eliminar</button>
        </form>
    </div>

    <!-- LISTA -->
    <div class="tarjeta">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
            <h2 style="margin:0;">📋 Lista de Refacciones</h2>
            <button onclick="location.reload()" class="btn btn-actualizar">🔄 Actualizar Lista</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Número #</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio ($)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(mysqli_num_rows($resultado) == 0){
                    echo "<tr><td colspan='4' style='color:white; opacity:0.7;'>No hay refacciones registradas aún</td></tr>";
                } else {
                  $contador=1;
                   while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>".$contador."</td>";
    echo "<td>".htmlspecialchars($fila['nombre'])."</td>";
    echo "<td>".htmlspecialchars($fila['cantidad'])."</td>";
    echo "<td>$".number_format((float)$fila['precio'], 2)."</td>";
      $contador++;
    echo "</tr>";
}
                }
                ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>

<?php
mysqli_close($conn);
?>
