<?php
require_once('../Controlador/admin_detalleProducto.php');
require_once('../Modelos/seleccionarDetalleProducto.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Producto - GamesTec</title>
    <link rel="stylesheet" href="../../styles.css">
</head>
<body class="contenido">
    <header>
        <div class="logo-container">
            <img src="../../img/GamesTecLogo.png" alt="GamesTec Logo">
            <h1>GamesTec</h1>
        </div>
        <nav>
            <div class="dropdown">
                <a href="../../Carrito/Vistas/mostrarCarrito.php">Carrito</a>
                <input type="checkbox" id="menu-toggle" hidden>
                <label for="menu-toggle" class="dropbtn">☰</label>
                <div class="dropdown-content">
                    <a href="#">Perfil</a>
                    <a href="../Controladores/contenidoController.php">Todas las categorías</a>
                    <a href="#">Biblioteca</a>
                    <a href="../../Acceso/Controlador/admin_logout.php">Cerrar sesión</a>
                </div>
            </div>
        </nav>
    </header>
    
    <main class="scroll">
        <div class="separador">
            <div class="detalle-producto">
                <div class="color">
                    <h1><?= htmlspecialchars($producto['nombreProducto']) ?></h1>
                    <img src="../../Dueño/Productos/imagenes/<?= htmlspecialchars($producto['imagen']) ?>" alt="<?= htmlspecialchars($producto['nombreProducto']) ?>">
                    <div class="seleccion">
                        <div class="padding">
                            <li><strong>$<?= number_format($producto['precioProducto'], 2) ?></strong></li>
                        </div>
                        <li><strong>En Stock: </strong><?= htmlspecialchars($producto['inventarioProducto']) ?></li>
                    </div>
                </div>
                <div align="center" class="botones">
                    <?php if ($producto['idCategoria'] == 5): ?>
                        <div class="botonesDemo">
                            <a href="<?= htmlspecialchars($producto['linkProducto']) ?>" target="_blank">Pruébalo</a>
                        </div><br>
                    <?php else: ?>
                    
                        <a href="../../Carrito/Controlador/admin_carrito.php?action=agregar&producto=<?= $producto['idProducto'] ?>">Agregar al Carrito</a>
                    <?php endif; ?>
                </div>
                <div class="descripcion">
                    <p><?= htmlspecialchars($producto['descripcionProducto']) ?></p>
                    <div class="back">
                        <a href="contenido.php">Volver al Catálogo</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="responsivo">
        <p>© 2025 GamesTec. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
