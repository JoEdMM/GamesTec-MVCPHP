<?php
require_once('../Controlador/admin_contenido.php');
require_once('../Modelos/seleccionarContenido.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Inicio - GamesTec</title>
    <link rel="stylesheet" href="../../styles.css">
</head>
<body class="contenido">
    <header>
        <div class="logo-container">
            <img src="../../img/GamesTecLogo.png" alt="GamesTec Logo">
            <h1>GamesTec</h1>
        </div>

        <div class="categorias">
            <?php foreach ($categorias as $categoria): ?>
                <li align="center"><a href="contenido.php?categoria=<?= $categoria['idCategoria'] ?>"><?= htmlspecialchars($categoria['nombreCategoria']) ?></a></li>
            <?php endforeach; ?>
        </div>
 
        <nav>
            <div class="dropdown">
                <a href="../../Carrito/Vistas/mostrarCarrito.php">Carrito</a>
                <input type="checkbox" id="menu-toggle" hidden>
                <label for="menu-toggle" class="dropbtn">☰</label>
                <div class="dropdown-content">
                    <a href="../../OpcionesUsuario/Vistas/mostrarCategorias.php">Todas las categorías</a>
                    <a href="../../OpcionesUsuario/Vistas/mostrarBiblioteca.php">Mi Biblioteca</a>
                    <a href="../../Acceso/Controlador/admin_logout.php">Cerrar sesión</a>
                </div>
            </div>
        </nav>
    </header>

    <main class="scroll">  
    <div class="grid-productos">
        <?php foreach ($productos as $producto): ?>
            <?php if ($producto['inventarioProducto'] > 0): ?>
                <div class="producto">
                    <img src="../../Dueño/Productos/imagenes/<?= htmlspecialchars($producto['imagen']) ?>" alt="<?= htmlspecialchars($producto['nombreProducto']) ?>">
                    <h2><?= htmlspecialchars($producto['nombreProducto']) ?></h2>
                    <p>Precio: $<?= number_format($producto['precioProducto'], 2) ?></p>
                    <div class="botonesProducto">
                        <?php if ($producto['idCategoria'] == 5): ?>
                            <li><a href="<?= htmlspecialchars($producto['linkProducto']) ?>" target="_blank">Pruébalo</a></li>
                        <?php else: ?>
                            <li><a href="../../Carrito/Controlador/admin_carrito.php?action=agregar&producto=<?= $producto['idProducto'] ?>">Añadir al Carrito</a></li>
                        <?php endif; ?>
                        <li><a href="detalleProducto.php?producto=<?= $producto['idProducto'] ?>">Detalles</a></li>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="responsivo">
        <p>© 2025 GamesTec. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
