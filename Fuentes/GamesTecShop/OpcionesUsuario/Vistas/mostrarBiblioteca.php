<?php
session_start();
require_once('../Modelos/readBiblioteca.php'); // o como se llame
$crud = new readBiblioteca();


if (!isset($_SESSION['idUsuario'])) {
    header('Location: ../../Acceso/login.php');
    exit;
}
$idUsuario = $_SESSION['idUsuario'];
$idCliente = $crud->obtenerIdClientePorUsuario($idUsuario);
$misJuegos = $crud->obtenerBibliotecaPorUsuario($idCliente);
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Mi Biblioteca - GamesTec</title>
    <link rel="stylesheet" href="../../styles.css">
</head>
<body class="bodyCarrito">
    <header>
        <div class="logo-container">
            <img src="../../img/GamesTecLogo.png" alt="GamesTec Logo">
            <h1>GamesTec</h1>
        </div>

        <div class="subtitulo">
				<strong align="center">Mi Biblioteca</strong><br>
			</div>
        <nav>
            <a href="../../Contenido/Vistas/contenido.php">Volver a la tienda</a>
        </nav>
    </header>

<main class="scroll">  
        <div class="grid-biblioteca">
        <?php if (count($misJuegos) > 0): ?>
            <?php foreach ($misJuegos as $juego): ?>
                <div class="producto">

                    
                    <?php if (!empty($juego['imagen'])): ?>
                        <img src="../../Dueño/Productos/imagenes/<?= htmlspecialchars($juego['imagen']) ?>" alt="<?= htmlspecialchars($juego['nombreProducto']) ?>">
                    <?php endif; ?>
                    <h2><?= htmlspecialchars($juego['nombreProducto']) ?></h2>

                    <div class="botonesProducto">
                    <li><a href="">Descargar Juego</a></li>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
        </div>
            <div class="mensajeBiblioteca">
                <h2>¡No tienes ningún juego en tu biblioteca!</h2>
                <p>No has comprado ningún juego aún.</p>
            </div>
        <?php endif; ?>
</main>

<footer class="responsivo">
    <p>© 2025 GamesTec. Todos los derechos reservados.</p>
</footer>
</body>
</html>
