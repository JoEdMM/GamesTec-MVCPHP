<?php
	//incluye la clase Libro y CrudLibro
	require_once('../Modelos/crudUsuarios.php');
	require_once('../Modelos/Usuarios.php');
	$crud= new crudUsuarios();
	$usuario= new Usuarios();
	//busca el libro utilizando el id, que es enviado por GET desde la vista mostrar.php
	$usuario=$crud->obtenerUsuario($_GET['idusuario']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminiación de Usuarios Moderadores - GamesTec</title>
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
			<strong align="center">Eliminar un Usuario Moderador</strong><br>
		</div>
            <form action='../Controladores/admin_usuario.php' method='post'>

        <div class="formulario">
			<table class="tablaFormulario">
				<tr>
					<input type='hidden' name='idusuario' value='<?php echo $usuario->getIdUsuario()?>'>
					<td class="cambiocolor">Identificador Usuario:</td>
					<td><input class="noeditar" type='text' name='idusuario' value='<?php echo $usuario->getIdUsuario()?>'readonly></td>
				</tr>

				<tr>
					<td class="cambiocolor">Identificador Tipo de Usuario:</td>
					<td><input class="noeditar" type='text' name='idtipousuario' value='<?php echo $usuario->getIdTipoUsuario()?>'readonly></td>
				</tr>

				<tr>
					<td class="cambiocolor">Correo Usuario:</td>
					<td><input type='text' name="correousuario"  value='<?php echo $usuario->getCorreoUsuario()?>' readonly></td>
				</tr>
				<tr>
					<td class="cambiocolor">Contraseña Usuario:</td>
					<td><input type='text' name="contrasenausuario" value='<?php echo $usuario->getContrasenaUsuario()?>' readonly></td>
				</tr>
			
			</table>

		</div>
	</main>
	<footer class="responsivo">		
        <div class="botones-inferiores">

			<a href="confirmacion.php?idusuario=<?php echo $usuario->getIdUsuario()?>&accion=e">
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
