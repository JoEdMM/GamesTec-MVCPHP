<?php
//incluye la clase Libro y CrudLibro
require_once('../Modelos/crudCategorias.php');
require_once('../Modelos/Categorias.php');
$crud= new crudCategorias();
$categoria= new Categorias();
	//busca el libro utilizando el id, que es enviado por GET desde la vista mostrar.php
	$categoria=$crud->obtenerCategoria($_GET['idcategoria']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminiación de Categorías - GamesTec</title>
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
			<strong align="center">Eliminar una Categoría</strong><br>
		</div>
            <form action='../Controladores/admin_categoria.php' method='post'>

        <div class="formulario">
			<table class="tablaFormulario">
				<tr>
					<input type='hidden' name='idcategoria' value='<?php echo $categoria->getIdCategoria()?>'>
					<td class="cambiocolor">Identificador Categoría:</td>
					<td><input class="noeditar" type='text' name='idcategoria' value='<?php echo $categoria->getIdCategoria()?>'readonly></td>
				</tr>
				
				<tr>
					<td class="cambiocolor">Nombre Categoria:</td>
					<td><input type='text' name='nombrecategoria' value='<?php echo $categoria->getNombreCategoria()?> 'readonly></td>
				</tr>
			</table>

		</div>
	</main>
	<footer class="responsivo">		
        <div class="botones-inferiores">

			<a href="confirmacion.php?idcategoria=<?php echo $categoria->getIdCategoria()?>&accion=e">
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
