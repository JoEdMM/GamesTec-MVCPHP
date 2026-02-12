<?php
session_start();
require_once('../Modelos/crudVentas.php');

$crud = new crudVentas();

if (!isset($_SESSION['idUsuario'])) {
    header("Location: ../Acceso/login.php?error=Debes iniciar sesión");
    exit;
}

$idUsuario = $_SESSION['idUsuario'];
$idCliente = $crud->obtenerIdClientePorUsuario($idUsuario);
$idCarrito = $_POST['idCarrito'];
$total = $_POST['total'];  

// Verificar si el cliente tiene tarjetas asociadas
$tarjetas = $crud->obtenerTarjetasPorCliente($idCliente);

if (empty($tarjetas)) {
    // No tiene tarjetas registradas
    header("Location: ../Vistas/tarjetas.php?idCarrito=$idCarrito&total=$total");
    exit;
} else {
    // Tiene tarjetas registradas
    header("Location: ../Vistas/mostrarTarjetas.php?idCarrito=$idCarrito&total=$total");
    exit;
}

