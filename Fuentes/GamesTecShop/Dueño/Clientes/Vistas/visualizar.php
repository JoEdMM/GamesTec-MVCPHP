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
    <title>Visualización de los Clientes - GamesTec</title>
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
			<strong align="center">Visualización de las Clientes</strong><br>
		</div>
            <form action='../Controladores/admin_cliente.php' method='post'>

        <div class="formulario">
			<table class="tablaFormulario">
				<tr>
					<input type='hidden' name='idcliente' value='<?php echo $cliente->getIdCliente()?>'>
					<td class="cambiocolor">Identificador Cliente:</td>
					<td><input class="noeditar" type='text' name='idcliente' value='<?php echo $cliente->getIdCliente()?>'readonly></td>
				</tr>
			</table>
<br>
			<table class="tablaFormulario">				
				<tr>
					<td class="cambiocolor">Identificador Usuario:</td>
					<td><input class="noeditar" type='text' name='idusuario' value='<?php echo $cliente->getIdUsuario()?>'readonly></td>
				</tr>
			</table>
<br>
			<table class="tablaFormulario">				
				<tr>
					<td class="cambiocolor">Nombre Usuario:</td>
					<td><input class="noeditar" type='text' name='nombreusuario' value='<?php echo $cliente->getNombreUsuario()?>'readonly></td>
				</tr>
			</table>
<br>

			<table class="tablaFormulario">				
				<tr>
					<td class="cambiocolor">Apellido Materno:</td>
					<td><input class="noeditar" type='text' name='primerapellidousuario' value='<?php echo $cliente->getPrimerApellidoUsuario()?>'readonly></td>
				</tr>
			</table>
<br>
			<table class="tablaFormulario">				
				<tr>
					<td class="cambiocolor">Apellido Paterno:</td>
					<td><input class="noeditar" type='text' name='segundoapellidousuario' value='<?php echo $cliente->getSegundoApellidoUsuario()?>'readonly></td>
				</tr>
			</table>
<br>
			<table class="tablaFormulario">				
				<tr>
					<td class="cambiocolor">Correo Cliente:</td>
					<td><input class="noeditar" type='text' name='correousuario' value='<?php echo $cliente->getCorreoUsuario()?>'readonly></td>
				</tr>

		</div>
	</main>

    <footer class="responsivo">		
        <div class="botones-inferiores">

			<a href="mostrar.php">
				<button type="button">Regresar</button>
			</a>

        </div>
	</footer>
</body>
</html>


