<?php
require_once('../../config/conexion.php');

class CrudVentas {

// Buscar tarjeta por número y cliente
    public static function buscarTarjetaPorNumeroYCliente($numeroTarjeta, $idCliente) {
        $db = Db::conectar();
        $sql = "SELECT dc.idTarjeta FROM datostarjeta dc
                INNER JOIN tarjetacliente tc ON dc.idTarjeta = tc.idTarjeta
                WHERE dc.numeroTarjeta = :numeroTarjeta AND tc.idCliente = :idCliente";
        $query = $db->prepare($sql);
        $query->bindParam(':numeroTarjeta', $numeroTarjeta);
        $query->bindParam(':idCliente', $idCliente);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Insertar datos de tarjeta
    public static function insertarDatosTarjeta($nombreTitular, $numeroTarjeta, $vencimiento, $cvv) {
        $db = Db::conectar();
        $sql = "INSERT INTO datostarjeta (nombreTitular, numeroTarjeta, vencimientoTarjeta, CVV)
                VALUES (:nombreTitular, :numeroTarjeta, :vencimiento, :cvv)";
        $query = $db->prepare($sql);
        $query->bindParam(':nombreTitular', $nombreTitular);
        $query->bindParam(':numeroTarjeta', $numeroTarjeta);
        $query->bindParam(':vencimiento', $vencimiento);
        $query->bindParam(':cvv', $cvv);
        $query->execute();
        return $db->lastInsertId();
    }

    // Insertar relación tarjeta-cliente
    public static function insertarTarjetaCliente($idTarjeta, $idCliente) {
        $db = Db::conectar();
        $sql = "INSERT INTO tarjetacliente (idTarjeta, idCliente) VALUES (:idTarjeta, :idCliente)";
        $query = $db->prepare($sql);
        $query->bindParam(':idTarjeta', $idTarjeta);
        $query->bindParam(':idCliente', $idCliente);
        return $query->execute();
        
    }

    public static function obtenerTarjetaCliente($idCliente) {
        $db = Db::conectar();
        $sql = "SELECT idTarjeta FROM tarjetaCliente WHERE idCliente = :idCliente LIMIT 1";
        $query = $db->prepare($sql);
        $query->bindParam(':idCliente', $idCliente);
        $query->execute();
    
        $resultado = $query->fetch();
        return $resultado ? $resultado['idTarjeta'] : null;
    }

    public static function obtenerIdClientePorUsuario($idUsuario) {
        $db = Db::conectar();
        $sql = "SELECT idCliente FROM clientes WHERE idUsuario = :idUsuario";
        $query = $db->prepare($sql);
        $query->bindParam(':idUsuario', $idUsuario);
        $query->execute();
        return $query->fetchColumn();
    }
    

    public function obtenerTarjetasPorCliente($idCliente) {
        $db = Db::conectar();
        $sql = "SELECT tc.idTarjeta, t.nombreTitular, t.numeroTarjeta, t.vencimientoTarjeta
                FROM tarjetaCliente tc
                INNER JOIN datosTarjeta t ON t.idTarjeta = tc.idTarjeta
                WHERE tc.idCliente = :idCliente";
        $query = $db->prepare($sql);
        $query->bindParam(':idCliente', $idCliente);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    

    public static function insertarVenta($idCliente, $total, $fecha) {
        $db = Db::conectar();
    
        // Obtener el idTarjeta asociado al cliente
        $idTarjeta = self::obtenerTarjetaCliente($idCliente);
        
        if ($idTarjeta === null) {
            throw new Exception("No se encontró tarjeta para el cliente con ID: $idCliente");
        }
    
        // Insertar la venta
        $sql = "INSERT INTO ventas (idCliente, idTarjeta, total, fecha) 
                VALUES (:idCliente, :idTarjeta, :total, :fecha)";
        $query = $db->prepare($sql);
        $query->bindParam(':idCliente', $idCliente);
        $query->bindParam(':idTarjeta', $idTarjeta);
        $query->bindParam(':total', $total);
        $query->bindParam(':fecha', $fecha);
        $query->execute();
    
        return $db->lastInsertId();
    }
    

    // Insertar detalle de venta
    public static function insertarDetalleVenta($idVenta, $idProducto, $cantidad, $precioUnitario) {
        $db = Db::conectar();
        $sql = "INSERT INTO detalle_venta (idVenta, idProducto, cantidad, precioUnitario)
                VALUES (:idVenta, :idProducto, :cantidad, :precioUnitario)";
        $query = $db->prepare($sql);
        $query->bindParam(':idVenta', $idVenta);
        $query->bindParam(':idProducto', $idProducto);
        $query->bindParam(':cantidad', $cantidad);
        $query->bindParam(':precioUnitario', $precioUnitario);
        return $query->execute();
    }

    public static function obtenerDetallesCarrito($idCarrito) {
        $db = Db::conectar();
        $query = $db->prepare("
            SELECT DC.idProducto, DC.cantidadProductos, DC.precioUnitario, 
                   (DC.cantidadProductos * DC.precioUnitario) AS subtotal
            FROM DetalleCarrito DC
            INNER JOIN Productos P ON DC.idProducto = P.idProducto
            WHERE DC.idCarrito = :idCarrito
        ");
        $query->bindParam(':idCarrito', $idCarrito);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    


    public static function eliminarDetalleCarrito($idCarrito) {
        $db = Db::conectar();
        $query = $db->prepare("DELETE FROM DetalleCarrito WHERE idCarrito = :idCarrito");
        $query->bindParam(':idCarrito', $idCarrito);
        return $query->execute();
    }
    
    public static function eliminarCarrito($idCarrito) {
        $db = Db::conectar();
        $query = $db->prepare("DELETE FROM Carrito WHERE idCarrito = :idCarrito");
        $query->bindParam(':idCarrito', $idCarrito);
        return $query->execute();
    }
    
    
}

?>
