<?php
session_start();
if (!isset($_SESSION['idUsuario'])) {
    header("Location: Acceso/login.php?error=Debes iniciar sesión");
    exit;
}
	//incluye la clase Libro y CrudLibro
	require_once('../Modelos/crudProductos.php');
	require_once('../Modelos/Productos.php');
	$crud= new crudProductos();
	$producto= new Productos();

		// si el elemento insertar no viene nulo llama al crud e inserta un libro
		if (isset($_POST['insertar'])) {
			// Guardar imagen en ruta específica
			$directorioDestino = '../Dueño/Productos/imagenes';
			$nombreArchivo = basename($_FILES['imagen']['name']);
			$rutaCompleta = 'C:/xampp/htdocs/GamesTecShop/Dueño/Productos/imagenes/' . $nombreArchivo; //<--- CAMBIAR LA RUTA EN CASO DE TENER EL XAMPP EN OTRO DISCO

		
			// Mueve el archivo a la carpeta destino
			if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaCompleta)) {
				// Si se mueve con éxito, se guarda la ruta en el objeto producto
				$producto->setImagen($nombreArchivo);
			} else {
				// Si falla, puedes manejar un error o usar una imagen por defecto
				$producto->setImagen(''); // O una ruta por defecto
			}
		
			// Resto del formulario
			$producto->setNombreCategoria($_POST['nombrecategoria']);
			$producto->setNombreProducto($_POST['nombreproducto']);
			$producto->setDescripcionProducto($_POST['descripcionproducto']);
			$producto->setPrecioProducto($_POST['precioproducto']);
			$producto->setInventarioProducto($_POST['inventarioproducto']);
			$producto->setLinkProducto($_POST['linkproducto']);
		
			$crud->insertar($producto);
			header('Location: ../Vistas/mostrar.php');
		}elseif (isset($_POST['actualizar'])) {		
			// Imagen
			if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK && !empty($_FILES['imagen']['name'])) {
				$directorioDestino = '../Dueño/Productos/imagenes/';
				$nombreArchivo = basename($_FILES['imagen']['name']);
				$rutaCompleta = 'C:/xampp/htdocs/GamesTecShop/Dueño/Productos/imagenes/' . $nombreArchivo; //<--- CAMBIAR LA RUTA EN CASO DE TENER EL XAMPP EN OTRO DISCO 
			
				if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaCompleta)) {
					// Se subió una nueva imagen
					$producto->setImagen($nombreArchivo);
				} else {
					$producto->setImagen('');
				}
			} else {
				// No se subió imagen, consultamos la imagen actual del producto
				require_once('../Modelos/crudProductos.php');
				$crudConsulta = new crudProductos();
				$productoActual = $crudConsulta->obtenerProducto($_POST['idproducto']); // Debes tener esta función en tu clase crudProductos
				$producto->setImagen($productoActual->getImagen());
			}
		
			// Datos del formulario
			$producto->setIdProducto($_POST['idproducto']); // ESTA LÍNEA ES CLAVE
			$producto->setNombreCategoria($_POST['nombrecategoria']);
			$producto->setNombreProducto($_POST['nombreproducto']);
			$producto->setDescripcionProducto($_POST['descripcionproducto']);
			$producto->setPrecioProducto($_POST['precioproducto']);
			$producto->setInventarioProducto($_POST['inventarioproducto']);
			$producto->setLinkProducto($_POST['linkproducto']);
		
			$crud->actualizar($producto);
			header('Location: ../Vistas/mostrar.php');
		}
		

		elseif(isset($_POST['actualizarexistencia'])){
			$producto->setCveproducto($_POST['cveproducto']);
			$producto->setDescripcion($_POST['descripcion']);
			$producto->setExistencia($_POST['existencia']);
			$crud->actualizarexistencia($producto);
			header('Location: localizar.php');
		// si la variable accion enviada por GET es == 'e' llama al crud y elimina un libro
		}elseif ($_GET['accion']=='e') {
			$crud->eliminar($_GET['idproducto']);
			header('Location: ../Vistas/mostrar.php');
		// si la variable accion enviada por GET es == 'a', envía a la página actualizar.php
		}elseif($_GET['accion']=='a'){
			header('Location: actualizar.php');
		}

	?>
