<?php
require_once('../../config/conexion.php');

class CrudCarritos {
    public static function obtenerCarritoActivo($idUsuario) {
        $db = Db::conectar();
        $query = $db->prepare("SELECT idCarrito FROM Carrito WHERE idUsuario = :idUsuario ORDER BY idCarrito DESC LIMIT 1");
        $query->bindParam(':idUsuario', $idUsuario);
        $query->execute();
        return $query->fetchColumn();
    }

    public static function crearCarrito($idUsuario) {
        $db = Db::conectar();
        $query = $db->prepare("INSERT INTO Carrito (idUsuario) VALUES (:idUsuario)");
        $query->bindParam(':idUsuario', $idUsuario);
        $query->execute();
        return $db->lastInsertId();
    }

    public static function obtenerPrecioProducto($idProducto) {
        $db = Db::conectar();
        $query = $db->prepare("SELECT precioProducto FROM Productos WHERE idProducto = :idProducto");
        $query->bindParam(':idProducto', $idProducto);
        $query->execute();
        return $query->fetchColumn();
    }

    public static function productoEnCarrito($idCarrito, $idProducto) {
        $db = Db::conectar();
        $query = $db->prepare("SELECT COUNT(*) FROM DetalleCarrito WHERE idCarrito = :idCarrito AND idProducto = :idProducto");
        $query->bindParam(':idCarrito', $idCarrito);
        $query->bindParam(':idProducto', $idProducto);
        $query->execute();
        return $query->fetchColumn() > 0;
    }

    public static function agregarProducto($idCarrito, $idProducto, $precio) {
        $db = Db::conectar();
        $query = $db->prepare("INSERT INTO DetalleCarrito (idCarrito, idProducto, cantidadProductos, precioUnitario) VALUES (:idCarrito, :idProducto, 1, :precio)");
        $query->bindParam(':idCarrito', $idCarrito);
        $query->bindParam(':idProducto', $idProducto);
        $query->bindParam(':precio', $precio);
        $query->execute();
    }

    public static function actualizarCantidadProducto($idCarrito, $idProducto) {
        $db = Db::conectar();
        $query = $db->prepare("UPDATE DetalleCarrito SET cantidadProductos = cantidadProductos + 1 WHERE idCarrito = :idCarrito AND idProducto = :idProducto");
        $query->bindParam(':idCarrito', $idCarrito);
        $query->bindParam(':idProducto', $idProducto);
        $query->execute();
    }

    public static function eliminarDetalleCarrito($idCarrito) {
        $db = Db::conectar();
        $query = $db->prepare("DELETE FROM DetalleCarrito WHERE idCarrito = :idCarrito");
        $query->bindParam(':idCarrito', $idCarrito);
        $query->execute();
    }

    public static function eliminarCarrito($idCarrito) {
        $db = Db::conectar();
        $query = $db->prepare("DELETE FROM Carrito WHERE idCarrito = :idCarrito");
        $query->bindParam(':idCarrito', $idCarrito);
        $query->execute();
    }

    public static function obtenerDetallesCarrito($idCarrito) {
        $db = Db::conectar();
        $query = $db->prepare("
            SELECT P.nombreProducto, DC.cantidadProductos, DC.precioUnitario, (DC.cantidadProductos * DC.precioUnitario) AS subtotal
            FROM DetalleCarrito DC
            INNER JOIN Productos P ON DC.idProducto = P.idProducto
            WHERE DC.idCarrito = :idCarrito
        ");
        $query->bindParam(':idCarrito', $idCarrito);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
