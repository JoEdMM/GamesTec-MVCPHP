<?php
session_start();
// Verifica si el usuario está autenticado
if (!isset($_SESSION['idUsuario'])) {
    header("Location: ../Acceso/login.php?error=Debes iniciar sesión");
    exit;
}


require_once('../Modelos/seleccionarDetalleProducto.php');

$selectDetalle = new seleccionarDetalleProducto();

if (!isset($_GET['producto']) || !filter_var($_GET['producto'], FILTER_VALIDATE_INT)) {
    die("<p>ID de producto inválido o no especificado.</p>");
}

$idProducto = $_GET['producto'];
$producto = $selectDetalle->obtenerIdProducto($idProducto);

if (!$producto) {
    die("<p>Producto no encontrado.</p>");
}

require_once('../Vistas/detalleProducto.php');
