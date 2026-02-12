<?php 
require_once('../../config/conexion.php');
require_once('../Modelos/Productos.php');

class readBiblioteca {
    public function __construct() {}

    public static function obtenerBibliotecaPorUsuario($idCliente) {
        $db = Db::conectar();
        $sql = "
            SELECT DISTINCT p.idProducto, p.nombreProducto, p.imagen
            FROM productos p
            INNER JOIN detalle_venta dv ON p.idProducto = dv.idProducto
            INNER JOIN ventas v ON dv.idVenta = v.idVenta
            WHERE v.idCliente = :idCliente
        ";
        $query = $db->prepare($sql);
        $query->bindParam(':idCliente', $idCliente);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function obtenerIdClientePorUsuario($idUsuario) {
        $db = Db::conectar();
        $sql = "SELECT idCliente FROM clientes WHERE idUsuario = :idUsuario";
        $query = $db->prepare($sql);
        $query->bindParam(':idUsuario', $idUsuario);
        $query->execute();
        return $query->fetchColumn();
    }
}
