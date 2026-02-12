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
$total = $_POST['total'];
$idCarrito = $_POST['idCarrito'];
$fecha = date('Y-m-d H:i:s');

if (isset($_POST['idTarjeta'])) {
    // se selecciona una tarjeta existente
    $idTarjeta = $_POST['idTarjeta'];
} else {
    // se ingresam  datos de una tarjeta nueva
    $nombreTitular = $_POST['nombre_titular'];
    $numeroTarjeta = $_POST['numero_tarjeta'];
    $vencimiento = $_POST['vencimiento_tarjeta'];
    $cvv = $_POST['cvv'];

    if (preg_match('/^(0[1-9]|1[0-2])\/([0-9]{2})$/', $vencimiento, $matches)) {
    $mes = $matches[1];
    $anio = '20' . $matches[2];
    $vencimiento = "$anio-$mes-01"; // formato compatible con DATE
} else {
    header("Location: ../../Contenido/Vistas/contenido.php?success=Vencimiento de tarjeta no válido");
    exit;
}

    

// Verificar si la tarjeta ya existe
$tarjetaExistente = $crud->buscarTarjetaPorNumeroYCliente($numeroTarjeta, $idCliente);

if (!$tarjetaExistente) {
    $idTarjeta = $crud->insertarDatosTarjeta($nombreTitular, $numeroTarjeta, $vencimiento, $cvv);
    $crud->insertarTarjetaCliente($idTarjeta, $idCliente);
} else {
    $idTarjeta = $tarjetaExistente['idTarjeta'];
}
    header("Location: ../../Contenido/Vistas/contenido.php?success=Tarjeta guardada correctamente");
    exit;
    
}


// Insertar venta
try {
    $idVenta = $crud->insertarVenta($idCliente, $total, $fecha);
} catch (Exception $e) {
    header("Location: ../../Contenido/Vistas/contenido.php?error=" . urlencode("No se pudo realizar la venta: " . $e->getMessage()));
    exit;
}

// Obtener detalles del carrito
$detalles = $crud->obtenerDetallesCarrito($idCarrito);

// Insertar detalles de la venta
foreach ($detalles as $detalle) {
    $crud->insertarDetalleVenta($idVenta, $detalle['idProducto'], $detalle['cantidadProductos'], $detalle['precioUnitario']);
}

// Vaciar carrito
$crud->eliminarDetalleCarrito($idCarrito);
$crud->eliminarCarrito($idCarrito);

// Redirigir
header("Location: ../../Contenido/Vistas/contenido.php?success=Compra realizada correctamente");
exit;

?>
