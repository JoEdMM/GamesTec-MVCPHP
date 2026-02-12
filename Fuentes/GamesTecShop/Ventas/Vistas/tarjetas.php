<?php
session_start();
require_once('../Modelos/crudVentas.php');
$crud = new crudVentas();

if (!isset($_SESSION['idUsuario'])) {
    header("Location: ../Acceso/login.php?error=Debes iniciar sesión");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Pago - GamesTec</title>
    <link rel="stylesheet" href="../../styles.css">
</head>
<body class="bodyCarrito">
    <header>
        <div class="logo-container">
            <img src="../../img/GamesTecLogo.png" alt="GamesTec Logo">
            <h1>GamesTec</h1>
        </div>

        <div class="subtitulo">
				<strong align="center">Formulario de Pago</strong><br>
			</div>
        <nav>
            <a href="../../Contenido/Vistas/contenido.php">Volver a la tienda</a>
        </nav>
    </header>

    <main class="scroll">

    <form action="../Controlador/admin_pagos.php" method="POST" style="color: black;">

        <div class="tabla-responsive">
            <table>
                    <tr>
                        <th class="cambiocolor">Nombre del Titular:</th>
                        <td><input type='text' name="nombre_titular" placeholder="Nombre del titular" required></td>
                    </tr>
                    <tr>
                        <th class="cambiocolor">Número de la Tarjeta:</td>
                        <td><input type='text' name='numero_tarjeta' placeholder="Número de la tarjeta" maxlength="16" required></td>
                    </tr>
                    <tr>
                        <th class="cambiocolor">Fecha de Vencimiento:</td>
                        <td><input type='text' name='vencimiento_tarjeta' placeholder="MM/AA" maxlength="5" required></td>
                    </tr>
                    <tr>
                        <th class="cambiocolor">CVV:</td>
                        <td><input type='text' name='cvv' placeholder="CVV de la tarjeta"  maxlength="4" required></td>
                    </tr>
                    
                    <tr>
                    <input type="hidden" name="idCarrito" value="<?= $idCarrito ?>">
                        <input type="hidden" name="total" value="<?= $total ?>">
                    </tr>
                
                    <tr class="tablacarrito">
                        <td colspan="2">
                            <div class="botonpago">
                                <button type="submit">Agregar Tarjeta</button>                        
                            </div>
                        </td>
                    </tr>
                    
            </table>

        </div>
    </form>    

    </main>

    <footer class="responsivo">
        <p>© 2025 GamesTec. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
