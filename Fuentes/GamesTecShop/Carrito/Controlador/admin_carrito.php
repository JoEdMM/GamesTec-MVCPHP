<?php
session_start();
require_once('../Modelos/crudCarritos.php');
$crud = new crudCarritos();

if (!isset($_SESSION['idUsuario'])) {
    header("Location: ../Acceso/login.php?error=Debes iniciar sesión");
    exit;
}

$idUsuario = $_SESSION['idUsuario'];
$action = isset($_GET['action']) ? $_GET['action'] : 'agregar';

if ($action === 'agregar') {
    if (!isset($_GET['producto']) || !filter_var($_GET['producto'], FILTER_VALIDATE_INT)) {
        header("Location: ../../Contenido/Vistas/contenido.php?error=ID de producto inválido");
        exit;
    }
    $idProducto = $_GET['producto'];
    $precio = $crud->obtenerPrecioProducto($idProducto);

    if (!$precio) {
        header("Location: ../../Contenido/Vistas/contenido.php?error=El producto no existe");
        exit;
    }

    $idCarrito = $crud->obtenerCarritoActivo($idUsuario);
    if (!$idCarrito) {
        $idCarrito = $crud->crearCarrito($idUsuario);
    }

    if ($crud->productoEnCarrito($idCarrito, $idProducto)) {
        $crud->actualizarCantidadProducto($idCarrito, $idProducto);
    } else {
        $crud->agregarProducto($idCarrito, $idProducto, $precio);
    }

    header("Location: ../../Contenido/Vistas/contenido.php?success=Producto añadido");
    exit;

} elseif ($action === 'vaciar') {
    $idCarrito = $crud->obtenerCarritoActivo($idUsuario);
    if ($idCarrito) {
        $crud->eliminarDetalleCarrito($idCarrito);
        $crud->eliminarCarrito($idCarrito);
    }
    header("Location: ../../Contenido/Vistas/contenido.php?success=Carrito vaciado");
    exit;

} else {
    header("Location: ../../Contenido/Vistas/contenido.php?error=Acción no válida");
    exit;
}
?>
