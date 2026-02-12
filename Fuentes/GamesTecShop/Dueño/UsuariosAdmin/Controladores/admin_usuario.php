<?php
	//incluye la clase Libro y CrudLibro
	require_once('../Modelos/crudUsuarios.php');
	require_once('../Modelos/Usuarios.php');
	$crud= new crudUsuarios();
	$usuario= new Usuarios();

		// si el elemento insertar no viene nulo llama al crud e inserta un libro
		if (isset($_POST['insertar'])) {
			$usuario->setIdUsuario($_POST['idusuario']);
			$usuario->setIdTipoUsuario($_POST['idtipousuario']);
			$usuario->setCorreoUsuario($_POST['correousuario']);
			$usuario->setContrasenaUsuario($_POST['contrasenausuario']);
		
			$crud->insertar($usuario);
			header('Location: ../Vistas/mostrar.php');
		}elseif(isset($_POST['actualizar'])){
			$usuario->setIdUsuario($_POST['idusuario']);
			$usuario->setIdTipoUsuario($_POST['idtipousuario']);
			$usuario->setCorreoUsuario($_POST['correousuario']);
			$usuario->setContrasenaUsuario($_POST['contrasenausuario']);
			$crud->actualizar($usuario);
			header('Location: ../Vistas/mostrar.php');
		// para que se pueda acualizar la existencia de un producto 
		}elseif ($_GET['accion']=='e') {
			$crud->eliminar($_GET['idusuario']);
			header('Location: ../Vistas/mostrar.php');
		// si la variable accion enviada por GET es == 'a', envía a la página actualizar.php
		}elseif($_GET['accion']=='a'){
			header('Location: actualizar.php');
		}

	?>
