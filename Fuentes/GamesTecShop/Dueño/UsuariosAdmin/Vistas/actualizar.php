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
    <title>Actualización de Información Usuarios Moderadores - GamesTec</title>
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
			<strong align="center">Actualizar Información de los Usuarios Moderadores</strong><br>
		</div>
            <form action='../Controladores/admin_usuario.php' method='post'>
	
	
		<div class="formulario">
            <table class="tablaFormulario">	
		<tr>
            <input type='hidden' name='idusuario' value='<?php echo $usuario->getIdUsuario()?>'>
            <input type='hidden' name='idtipousuario' value='<?php echo $usuario->getIdTipoUsuario()?>'>
			<td class="cambiocolor">Correo Usuario:</td>
			<td><input type='text' name='correousuario' value='<?php echo $usuario->getCorreoUsuario()?>' placeholder="Correo Usuario" required></td>
		</tr>
		<tr>
			<td class="cambiocolor">Contraseña Usuario:</td>
			<td><input type='text' name='contrasenausuario' value='<?php echo $usuario->getContrasenaUsuario()?>' placeholder="Contraseña Usuario" required minlength="8"></td>
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