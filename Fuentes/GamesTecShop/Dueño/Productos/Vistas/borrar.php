<?php
require_once('../Modelos/crudProductos.php');
require_once('../Modelos/Productos.php');
$crud= new crudProductos();
$producto= new Productos();
	//busca el libro utilizando el id, que es enviado por GET desde la vista mostrar.php
	$producto=$crud->obtenerProducto($_GET['idproducto']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminiación de Productos - GamesTec</title>
    <link rel="stylesheet" href="../../styleAdmin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="bodyFormualario">
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
			<strong align="center">Eliminar un Producto</strong><br>
		</div>
            <form action='../Controladores/admin_producto.php' method='post' enctype='multipart/form-data'>

        <div class="formulario">
			<table class="tablaFormulario">
				<tr>
					<input type='hidden' name='idproducto' value='<?php echo $producto->getIdProducto()?>'>
					<td class="cambiocolor">Clave Producto:</td>
					<td><input class="noeditar" type='text' name='idproducto' value='<?php echo $producto->getIdProducto()?>'readonly></td>
				</tr>
				
				<tr>
					<td class="cambiocolor">Categoria:</td>
					<td><input type='text' name='nombrecategoria' value='<?php echo $producto->getNombreCategoria()?> 'readonly></td>
				</tr>
				<tr>
					<td class="cambiocolor">Imagen:</td>
					<td class="mostrarImagen"><img src="../imagenes/<?php echo $producto->getImagen(); ?>"></td>
				</tr>
				<tr>
					<td class="cambiocolor">Nombre:</td>
					<td><input type='text' name='nombreproducto' value='<?php echo $producto->getNombreProducto()?> 'readonly></td>
				</tr>

				<tr>
					<td class="cambiocolor">Descripcion:</td>
					<td><input type='text' name='descripcionproducto' value='<?php echo $producto->getDescripcionProducto()?> 'readonly></td>
				</tr>
				<tr>
					<td class="cambiocolor">Precio:</td>
					<td><input type='number' name='precioproducto' size="4" min="0" max="9999" value='<?php echo $producto->getPrecioProducto()?> 'readonly></td>
				</tr>
				<tr>
					<td class="cambiocolor">Inventario:</td>
					<td><input type='number' name='inventarioproducto' size="5" min="0" max="9999" value='<?php echo $producto->getInventarioProducto()?> 'readonly></td>
				</tr>
				<tr>
					<td class="cambiocolor">Link:</td>
					<td><input type='text' name='linkproducto' value='<?php echo $producto->getLinkProducto()?>' readonly></td>
				</tr>
			</table>

		</div>
	</main>
	<footer class="responsivo">		
        <div class="botones-inferiores">

			<a href="confirmacion.php?idproducto=<?php echo $producto->getIdProducto()?>&accion=e">
				<button type="button">Borrar</button>
			</a>

			<a href="mostrar.php">
				<button type="button">Cancelar</button>
			</a>

        </div>
	</footer>


</form>
</body>
</html>
