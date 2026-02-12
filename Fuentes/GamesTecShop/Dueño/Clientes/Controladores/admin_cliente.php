	<?php
	//incluye la clase Libro y CrudLibro
	require_once('../Modelos/crudClientes.php');
	require_once('../Modelos/Clientes.php');
	$crud= new crudClientes();
	$cliente= new Clientes();

		// si el elemento insertar no viene nulo llama al crud e inserta un libro
		if (isset($_POST['insertar'])) {
			$cliente->setIdCliente($_POST['idcliente']);
			$cliente->setIdUsuario($_POST['idusuario']);
			$cliente->setNombreUsuario($_POST['nombreusuario']);
			$cliente->setPrimerApellidoUsuario($_POST['primerapellidousuario']);
			$cliente->setSegundoApellidoUsuario($_POST['segundoapellidousuario']);
		
			$crud->insertar($cliente);
			header('Location: ../Vistas/mostrar.php');
		}elseif(isset($_POST['actualizar'])){
			$cliente->setIdCliente($_POST['idcliente']);
			$cliente->setIdUsuario($_POST['idusuario']);
			$cliente->setNombreUsuario($_POST['nombreusuario']);
			$cliente->setPrimerApellidoUsuario($_POST['primerapellidousuario']);
			$cliente->setSegundoApellidoUsuario($_POST['segundoapellidousuario']);
			$cliente->setCorreoUsuario($_POST['correousuario']);
			$crud->actualizar($cliente);
			header('Location: ../Vistas/mostrar.php');
		// para que se pueda acualizar la existencia de un producto 
		}elseif ($_GET['accion']=='e') {
			$crud->eliminar($_GET['idcliente']);
			header('Location: ../Vistas/mostrar.php');
		// si la variable accion enviada por GET es == 'a', envía a la página actualizar.php
		}elseif($_GET['accion']=='a'){
			header('Location: actualizar.php');
		}

	?>
