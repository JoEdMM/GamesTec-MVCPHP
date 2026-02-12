<?php
require_once('../../config/conexion.php');

class seleccionarDetalleProducto {
    public static function obtenerIdProducto($idProducto) {
        $db = Db::conectar();
        $select = $db->prepare("SELECT * FROM Productos WHERE idProducto = :id");
        $select->bindParam(':id', $idProducto, PDO::PARAM_INT);
        $select->execute();

        return $select->fetch(PDO::FETCH_ASSOC);
    }
}
