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
    <title>Actualización de Información Clientes - GamesTec</title>
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
			<strong align="center">Actualizar Información de los Clientes</strong><br>
		</div>
            <form action='../Controladores/admin_cliente.php' method='post'>
	
	
		<div class="formulario">
            <table class="tablaFormulario">	
		<tr>
			<input type='hidden' name='idcliente' value='<?php echo $cliente->getIdCliente()?>'>
            <input type='hidden' name='idusuario' value='<?php echo $cliente->getIdUsuario()?>'>
			<td class="cambiocolor">Nombre Cliente:</td>
			<td><input type='text' name='nombreusuario' value='<?php echo $cliente->getNombreUsuario()?>' placeholder="Nombres" required></td>
		</tr>
        <tr>
			<td class="cambiocolor">Apellido Materno:</td>
			<td><input type='text' name='primerapellidousuario' value='<?php echo $cliente->getPrimerApellidoUsuario()?>' placeholder="Apellido Materno" required></td>
		</tr>
        <tr>
			<td class="cambiocolor">Apellido Paterno:</td>
			<td><input type='text' name='segundoapellidousuario' value='<?php echo $cliente->getSegundoApellidoUsuario()?>' placeholder="Apellido Paterno"></td>
        </tr>
        <tr>
			<td class="cambiocolor">Correo Cliente:</td>
			<td><input type='email' name='correousuario' value='<?php echo $cliente->getCorreoUsuario()?>' placeholder="Correo electrónico" required></td>
        </tr>
		<input type='hidden' name='actualizar' value='actualizar'>
		</table>
    </div>
	</main>

    <footer class="responsivo">		
        <div class="botones-inferiores">
                <input type='submit' value='Guardar'>
</form>
                <a href="mostrar.php"><button>Cancelar</button></a>
        </div>
    </footer>
</body>
</html>