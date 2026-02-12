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
    <title>Eliminiación de Clientes - GamesTec</title>
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
			<strong align="center">Eliminar un Cliente</strong><br>
		</div>
            <form action='../Controladores/admin_cliente.php' method='post'>

        <div class="formulario">
			<table class="tablaFormulario">
				<tr>
					<input type='hidden' name='idcliente' value='<?php echo $cliente->getIdCliente()?>'>
					<td class="cambiocolor">Identificador Cliente:</td>
					<td><input class="noeditar" type='text' name='idcliente' value='<?php echo $cliente->getIdCliente()?>'readonly></td>
				</tr>
				
				<tr>
				<td class="cambiocolor">Identificador Usuario:</td>
					<td><input class="noeditar" type='text' name='idusuario' value='<?php echo $cliente->getIdUsuario()?>'readonly></td>
				</tr>
				
				<tr>
					<td class="cambiocolor">Nombre Cliente:</td>
					<td><input type='text' name='nombreUsuario' value='<?php echo $cliente->getNombreUsuario()?> 'readonly></td>
				</tr>
				<tr>
					<td class="cambiocolor">Apellido Materno:</td>
					<td><input type='text' name='primerapellidousuario' value='<?php echo $cliente->getPrimerApellidoUsuario()?>' readonly></td>
				</tr>
				<tr>
					<td class="cambiocolor">Apellido Paterno:</td>
					<td><input type='text' name='segundoapellidousuario' value='<?php echo $cliente->getSegundoApellidoUsuario()?>' readonly></td>
				</tr>

				<tr>
					<td class="cambiocolor">Correo Cliente:</td>
					<td><input type='email' name='correousuario' value='<?php echo $cliente->getCorreoUsuario()?>' readonly></td>
				</tr>
			</table>

		</div>
	</main>
	<footer class="responsivo">		
        <div class="botones-inferiores">

			<a href="confirmacion.php?idcliente=<?php echo $cliente->getIdCliente()?>&accion=e">
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
