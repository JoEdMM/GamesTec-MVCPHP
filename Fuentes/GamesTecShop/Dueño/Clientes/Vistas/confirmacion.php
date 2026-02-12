<?php
	//incluye la clase Libro y CrudLibro
	require_once('../Modelos/crudClientes.php');
	require_once('../Modelos/Clientes.php');
	$crud= new crudClientes();
	$cliente= new Clientes();
	//busca el libro utilizando el id, que es enviado por GET desde la vista mostrar.php
	$cliente=$crud->obtenerCliente($_GET['idcliente']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación Eliminación de Clientes - GamesTec</title>
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
		<h2 align="center">¿Estás seguro de borrar este cliente?</h2>

		<form action='../Controladores/admin_cliente.php' method='get' align="center">
			<input type="hidden" name="idcliente" value="<?php echo $cliente->getIdCliente(); ?>">
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
