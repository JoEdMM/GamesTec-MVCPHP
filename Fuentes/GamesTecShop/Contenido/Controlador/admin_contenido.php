<?php
session_start();
if (!isset($_SESSION['idUsuario'])) {
    header("Location: Acceso/login.php?error=Debes iniciar sesión");
    exit;
}

require_once('../Modelos/seleccionarContenido.php');

$contenido = new seleccionarContenido();

$categorias = $contenido->obtenerCategorias();

$idCategoria = isset($_GET['categoria']) ? filter_var($_GET['categoria'], FILTER_VALIDATE_INT) : null;
$productos = $contenido->obtenerProductos($idCategoria);

require_once('../Vistas/contenido.php');


if (isset($_GET['success'])) {
    echo '<p class="alerta">' . htmlspecialchars($_GET['success']) . '</p>';
}