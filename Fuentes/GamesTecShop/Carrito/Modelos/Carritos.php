<?php
class Carrito {
    public $idCarrito;
    public $idUsuario;
    public $fechaCreacionCarrito;

    public function __construct($idCarrito = null, $idUsuario = null, $fechaCreacionCarrito = null) {
        $this->idCarrito = $idCarrito;
        $this->idUsuario = $idUsuario;
        $this->fechaCreacionCarrito = $fechaCreacionCarrito;
    }
}

class DetalleCarrito {
    public $idDetalle;
    public $idCarrito;
    public $idProducto;
    public $cantidadProductos;
    public $precioUnitario;

    public function __construct($idDetalle = null, $idCarrito = null, $idProducto = null, $cantidadProductos = null, $precioUnitario = null) {
        $this->idDetalle = $idDetalle;
        $this->idCarrito = $idCarrito;
        $this->idProducto = $idProducto;
        $this->cantidadProductos = $cantidadProductos;
        $this->precioUnitario = $precioUnitario;
    }
}
?>
