<?php
require_once('../../../config/conexion.php');
require_once('../Modelos/Ventas.php');

class crudVentas {
    public function __construct() {}


    public function mostrarVentas(){         
        $db = Db::conectar();         
        $listaVenta = [];          
        
        $select = $db->query('SELECT * FROM ventas ');          
        
        foreach($select->fetchAll() as $venta){             
            $myVenta = new Ventas();             
            $myVenta->setIdVenta($venta['idVenta']);             
            $myVenta->setIdCliente($venta['idCliente']);             
            $myVenta->setIdTarjeta($venta['idTarjeta']);             
            $myVenta->setTotal($venta['total']);           
            $myVenta->setFecha($venta['fecha']);
                      
            $listaVenta[] = $myVenta;         
        }          
    
    return $listaVenta;     
    }

   public function mostrarDetalleVentas(){                  
    $db = Db::conectar();                  
    $listaVenta = [];                            
    
    $select = $db->query('SELECT dv.idDetalle, dv.idVenta, dv.idProducto, p.nombreProducto, dv.cantidad, dv.precioUnitario FROM detalle_venta dv INNER JOIN Productos p ON dv.idProducto = p.idProducto ORDER BY dv.idDetalle ASC');                          
    
    foreach($select->fetchAll() as $venta){                          
        $myVenta = new Ventas();                          
        $myVenta->setIdDetalle($venta['idDetalle']);                          
        $myVenta->setIdVenta($venta['idVenta']);                          
        $myVenta->setIdProducto($venta['idProducto']);               
        $myVenta->setNombreProducto($venta['nombreProducto']);               
        $myVenta->setCantidad($venta['cantidad']);                          
        $myVenta->setPrecioUnitario($venta['precioUnitario']);                                            
        $listaVenta[] = $myVenta;                  
    }    
    
    return $listaVenta;           
}
}
?>
