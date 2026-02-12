<?php
session_start();
require_once('../Modelos/crudVentas.php');
$crud = new crudVentas();

$idUsuario = $_SESSION['idUsuario'];
$idCliente = $crud->obtenerIdClientePorUsuario($idUsuario);
$tarjetas = $crud->obtenerTarjetasPorCliente($idCliente);
$idCarrito = $_GET['idCarrito'];
$total = $_GET['total'];
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
        <form action="../Controlador/admin_pagos.php" method="POST">
            <?php foreach ($tarjetas as $tarjeta): ?>
                
                <div class="tarjetas">
                    <li>
                        <input type="radio" name="idTarjeta" value="<?= $tarjeta['idTarjeta'] ?>" required>
                        <?= $tarjeta['nombreTitular'] ?> - ****<?= substr($tarjeta['numeroTarjeta'], -4) ?> - Vence <?= $tarjeta['vencimientoTarjeta'] ?>
                    </li>
                </div>
            <?php endforeach; ?>
            <input type="hidden" name="idCarrito" value="<?= $idCarrito ?>">
            <input type="hidden" name="total" value="<?= $total ?>">
            <div class="botonTarjeta">
                <button type="submit">Pagar con tarjeta seleccionada</button>
            </div>
        </form>


        <div class="botonTarjetaAgregar">
            <a href="tarjetas.php?idCarrito=<?= $idCarrito ?>&total=<?= $total ?>">Agregar nueva tarjeta</a>
        </div>

    
    </main>
    <footer class="responsivo">
            <p>© 2025 GamesTec. Todos los derechos reservados.</p>
    </footer>
</body>
</html>