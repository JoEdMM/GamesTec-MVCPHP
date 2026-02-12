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
    <title>Confirmación Eliminación de Categorías - GamesTec</title>
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
	<div class="popup">
		<h2 align="center">¿Estás seguro de borrar esta Categoría?</h2>

		<form action='../Controladores/admin_categoria.php' method='get' align="center">
			<input type="hidden" name="idcategoria" value="<?php echo $categoria->getIdCategoria(); ?>">
			<input type="hidden" name="accion" value="e">
			<button type="submit">Sí</button>

			<a href="mostrar.php">
			<button type="button">No</button></a>
		</form>

	</div>
</main>
	<footer class="responsivo">		
	<p>© 2025 GamesTec. Todos los derechos reservados.</p>
	</footer>
</body>
</html>
