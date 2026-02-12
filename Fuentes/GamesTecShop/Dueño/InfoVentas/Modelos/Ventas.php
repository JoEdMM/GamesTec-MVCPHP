<?php 
class Ventas {     
    private $idVenta;     
    private $idCliente;     
    private $idTarjeta;     
    private $total;     
    private $fecha;     
    private $idDetalle;     
    private $idProducto;   
    private $nombreProducto;  
    private $cantidad;     
    private $precioUnitario;
    
    // ID Venta
    public function getIdVenta() {         
        return $this->idVenta;     
    }      
    
    public function setIdVenta($idVenta) {         
        $this->idVenta = $idVenta;     
    }      
    
    // ID Cliente
    public function getIdCliente() {         
        return $this->idCliente;     
    }      
    
    public function setIdCliente($idCliente) {         
        $this->idCliente = $idCliente;     
    }
    
    // ID Tarjeta
    public function getIdTarjeta() {
        return $this->idTarjeta;
    }
    
    public function setIdTarjeta($idTarjeta) {
        $this->idTarjeta = $idTarjeta;
    }
    
    // Total
    public function getTotal() {
        return $this->total;
    }
    
    public function setTotal($total) {
        $this->total = $total;
    }
    
    // Fecha
    public function getFecha() {
        return $this->fecha;
    }
    
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    
    // ID Detalle
    public function getIdDetalle() {
        return $this->idDetalle;
    }
    
    public function setIdDetalle($idDetalle) {
        $this->idDetalle = $idDetalle;
    }
    
    // ID Producto
    public function getIdProducto() {
        return $this->idProducto;
    }
    
    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }
    
    //Nombre del Porducto
    public function getNombreProducto() {
        return $this->nombreProducto;
    }

    public function setNombreProducto($nombreProducto) {
        $this->nombreProducto = $nombreProducto;
    }

    // Cantidad
    public function getCantidad() {
        return $this->cantidad;
    }
    
    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    
    // Precio Unitario
    public function getPrecioUnitario() {
        return $this->precioUnitario;
    }
    
    public function setPrecioUnitario($precioUnitario) {
        $this->precioUnitario = $precioUnitario;
    }
}
?>