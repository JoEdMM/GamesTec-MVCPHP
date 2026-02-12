<?php
class Productos {
    private $idProducto;
    private $idCategoria;
    private $nombreCategoria;
    private $imagen;
    private $nombreProducto;
    private $descripcionProducto;
    private $precioProducto;
    private $inventarioProducto;
    private $linkProducto;

    public function __construct() {
        $this->precioProducto = 0;
        $this->inventarioProducto = 0;
    }

    // ID
    public function getIdProducto() {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    // Categoría
    public function getIdCategoria() {
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    public function getNombreCategoria() {
        return $this->nombreCategoria;
    }

    public function setNombreCategoria($nombreCategoria) {
        $this->nombreCategoria = $nombreCategoria;
    }

    // Imagen
    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    // Nombre del producto
    public function getNombreProducto() {
        return $this->nombreProducto;
    }

    public function setNombreProducto($nombreProducto) {
        $this->nombreProducto = $nombreProducto;
    }

    // Descripción del producto
    public function getDescripcionProducto() {
        return $this->descripcionProducto;
    }

    public function setDescripcionProducto($descripcionProducto) {
        $this->descripcionProducto = $descripcionProducto;
    }

    // Precio
    public function getPrecioProducto() {
        return $this->precioProducto;
    }

    public function setPrecioProducto($precioProducto) {
        $this->precioProducto = $precioProducto;
    }

    // Inventario
    public function getInventarioProducto() {
        return $this->inventarioProducto;
    }

    public function setInventarioProducto($inventarioProducto) {
        $this->inventarioProducto = $inventarioProducto;
    }

    // Link del producto
    public function getLinkProducto() {
        return $this->linkProducto;
    }

    public function setLinkProducto($linkProducto) {
        $this->linkProducto = $linkProducto;
    }
}
?>
