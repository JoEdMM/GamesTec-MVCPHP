<?php
require_once('../Modelos/crudProductos.php');
require_once('../Modelos/Productos.php');
$crud = new crudProductos();
$producto = new Productos();
$producto = $crud->obtenerProducto($_GET['idproducto']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Visualización Final del Producto - GamesTec</title>
    <link rel="stylesheet" href="../../styleAdmin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<header>
        <div class="header-grid">
            <div class="logo-container">
                <img src="../../../img/GamesTecLogo.png" alt="GamesTec Logo">
                <h1>GamesTec</h1>
            </div>
            <div class="admin">
                <h2>Administración</h2>
            </div>
        </div>
</header>

<body>
	<main class="scroll">
	<div class="subtitulo">
			<strong align="center">Visualización Final del Producto</strong><br>
		</div>
    
		<div class="separador">
			<div class="visualizar-contenido">
				<div class="color">
					<h1><?php echo $producto->getNombreProducto() ?></h1>
					<img src="../imagenes/<?php echo $producto->getImagen(); ?>">
					<div class="seleccion">
						<div class="padding">
							<li><strong>$<?php echo $producto->getPrecioProducto() ?></strong></li>
						</div>
							<li><strong>En Stock: <?php echo $producto->getInventarioProducto() ?></strong></li>
            			</div>
					</div>
					<div align="center" class="botones">
				<?php if ($producto->getIdCategoria() == 5): ?>
					<div class="botonesDemo">
						<a href="<?php echo $producto->getLinkProducto() ?>" target="_blank">Pruébalo</a>
				</div><br>
				<?php else: ?>
					<a>Comprar Producto</a><br>
					<a>Agregar al Carrito</a>
					<?php endif; ?>			
			</div>
					
			<div class="descripcion">
            <p><?php echo $producto->getDescripcionProducto(); ?></p> <!-- Asegúrate de tener esta columna -->
            <div class="back">
                <a href="mostrar.php">Volver al Catálogo</a>
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


