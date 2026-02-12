	<?php
	//incluye la clase Libro y CrudLibro
	require_once('../Modelos/crudCategorias.php');
	require_once('../Modelos/Categorias.php');
	$crud= new crudCategorias();
	$categoria= new Categorias();

		// si el elemento insertar no viene nulo llama al crud e inserta un libro
		if (isset($_POST['insertar'])) {
			$categoria->setIdCategoria($_POST['idcategoria']);
			$categoria->setNombreCategoria($_POST['nombrecategoria']);
		
			$crud->insertar($categoria);
			header('Location: ../Vistas/mostrar.php');
		}elseif(isset($_POST['actualizar'])){
			$categoria->setIdCategoria($_POST['idcategoria']);
			$categoria->setNombreCategoria($_POST['nombrecategoria']);
			$crud->actualizar($categoria);
			header('Location: ../Vistas/mostrar.php');
		// para que se pueda acualizar la existencia de un producto 
		}elseif ($_GET['accion']=='e') {
			$crud->eliminar($_GET['idcategoria']);
			header('Location: ../Vistas/mostrar.php');
		// si la variable accion enviada por GET es == 'a', envía a la página actualizar.php
		}elseif($_GET['accion']=='a'){
			header('Location: actualizar.php');
		}

	?>
