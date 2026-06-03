<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Italika - Refacciones</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            /* Fondo azul/oscuro igual al diseño que hiciste */
            background-color: #0a1929;
            background-image: radial-gradient(circle at top left, #1a3b69, #0a1929 70%);
            color: white;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .contenedor-principal {
            max-width: 1000px;
            margin: 0 auto;
        }

        /* CUADRO PRINCIPAL CON DISEÑO IRREGULAR */
        .cuadro-bienvenida {
            background: rgba(25, 80, 140, 0.6);
            border-radius: 60px 20px 80px 40px; /* Forma deformada como la plantilla */
            padding: 50px 40px;
            margin-bottom: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            border: 1px solid rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .titulo-grande {
            font-size: 4.5em;
            font-weight: 900;
            line-height: 1;
            color: #ffffff;
            text-shadow: 0 0 15px rgba(255,255,255,0.3);
        }

        .texto-descripcion {
            background: rgba(255,255,255,0.1);
            padding: 25px;
            border-radius: 20px;
            max-width: 45%;
            font-size: 1.1em;
            line-height: 1.6;
        }

        .icono-moto {
            font-size: 6em;
            opacity: 0.8;
        }

        /* SECCIONES DE INFORMACIÓN */
        .seccion {
            background: rgba(255,255,255,0.08);
            border-radius: 30px 15px 40px 25px;
            padding: 30px;
            margin: 20px 0;
            border: 1px solid rgba(255,255,255,0.1);
            backdrop-filter: blur(8px);
        }

        .seccion h2 {
            color: #8ab4f8;
            margin-bottom: 15px;
            font-size: 1.5em;
        }

        .seccion p {
            font-size: 1.1em;
            line-height: 1.5;
            opacity: 0.9;
        }

        /* BOTÓN DE LOGIN */
        .boton-acceso {
            text-align: center;
            margin-top: 50px;
        }

        .boton-acceso a {
            background: #2563eb;
            color: white;
            padding: 18px 50px;
            border-radius: 50px;
            font-size: 1.3em;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 8px 20px rgba(0,0,0,0.25);
            transition: all 0.3s ease;
            display: inline-block;
        }

        .boton-acceso a:hover {
            transform: scale(1.05);
            background: #1d4ed8;
        }

        .pie {
            text-align: center;
            margin-top: 60px;
            opacity: 0.6;
            font-size: 0.95em;
        }
    </style>
</head>
<body>

<div class="contenedor-principal">

    <!-- CUADRO PRINCIPAL -->
    <div class="cuadro-bienvenida">
        <div class="titulo-grande">
            BIENVENIDOS<br>
            A JENNIFER
        </div>
        <div class="texto-descripcion">
            <p>Somos una empresa dedicada a la venta de refacciones de motocicletas.</p>
        </div>
        <div class="icono-moto">
            🏍️
        </div>
    </div>

    <!-- SECCIÓN PRODUCTOS -->
    <div class="seccion">
        <h2>📦 PRODUCTOS</h2>
        <p>Contamos con una amplia variedad de refacciones de alta calidad para todo tipo de motocicletas.</p>
    </div>

    <!-- SECCIÓN MISIÓN -->
    <div class="seccion">
        <h2>🎯 MISIÓN</h2>
        <p>Ofrecer productos confiables a nuestros clientes, garantizando calidad y buen servicio.</p>
    </div>

    <!-- SECCIÓN VISIÓN -->
    <div class="seccion">
        <h2>🚀 VISIÓN</h2>
        <p>Ser líderes en el mercado de refacciones, reconocidos por nuestra excelencia y compromiso.</p>
    </div>

    <!-- BOTÓN PARA IR AL LOGIN -->
    <div class="boton-acceso">
        <a href="login.php">🔐 IR AL SISTEMA (LOGIN)</a>
    </div>

    <!-- PIE DE PÁGINA -->
    <div class="pie">
        <p>EQUIPO 2 - SISTEMAS OPERATIVOS</p>
    </div>

</div>

</body>
</html>
