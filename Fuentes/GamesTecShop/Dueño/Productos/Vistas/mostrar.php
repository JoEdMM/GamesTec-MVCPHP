<?php
require_once('../Modelos/crudProductos.php');
require_once('../Modelos/Productos.php');
require_once('../../Controlador/admin_dueño.php');
$crud = new crudProductos();
$producto = new Productos();
$listaProductos = $crud->mostrar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> Productos en Tienda - GamesTec
	</title>
    <link rel="stylesheet" href="../../styleAdmin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
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
		<main class="scroll">
			<div class="subtitulo">
				<strong align="center">Administración Productos</strong><br>
			</div>
			
			<div class="tabla-responsive">
				<table>
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Nombre</th>
							<th>Categoria</th>
							<th>Descripción</th>
							<th>Precio</th>
							<th>Inventario</th>
							<th>Link</th>
							<th>Visualiza</th>
							<th>Edita</th>
							<th>Borra</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($listaProductos as $producto) { ?>
							<tr>
								<td> <img src="../imagenes/<?php echo $producto->getImagen(); ?>"></td>
								<td><?php echo $producto->getNombreProducto(); ?></td>
								<td><?php echo $producto->getNombreCategoria(); ?></td>
								<td><?php echo $producto->getDescripcionProducto(); ?></td>
								<td><?php echo '$' . $producto->getPrecioProducto(); ?></td>
								<td><?php echo $producto->getInventarioProducto(); ?></td>
								<td><?php echo $producto->getLinkProducto(); ?>
								<td><a href="visualizar.php?idproducto=<?php echo $producto->getIdProducto(); ?>?idcategoria=<?php echo $producto->getIdCategoria(); ?>"><img src="../../imagenes/visualiza.jpg" alt="Visualizar" width="24"></a></td>
								<td><a href="actualizar.php?idproducto=<?php echo $producto->getIdProducto(); ?>&accion=a"><img src="../../imagenes/edita.png" alt="Editar" width="24"></a></td>
								<td><a href="borrar.php?idproducto=<?php echo $producto->getIdProducto(); ?>&accion=e"><img src="../../imagenes/borra.jpg" alt="Borrar" width="24"></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</main>

    <footer class="responsivo">
						
	<div class="botones-inferiores">
		<a href="ingresar.php"><button>Nuevo</button></a>		
		<a href="../../index.php"><button type="button" >Regresar</button></a>
            
            <!-- <a href="imprimir.php"><button>Imprime</button></a>-->
        </div>
    </footer>
</body>
</html>
