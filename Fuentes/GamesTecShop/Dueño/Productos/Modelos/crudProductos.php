<?php
require_once('../../../config/conexion.php');
require_once('../Modelos/Productos.php');

class crudProductos {
    public function __construct() {}

    // CREATE
    public function insertar($producto) {
        $db = Db::conectar();
    
        // Paso 1: Buscar el ID de la categoría a partir del nombre
        $consulta = $db->prepare('SELECT idCategoria FROM Categoria WHERE nombreCategoria = :nombreCategoria');
        $consulta->bindValue('nombreCategoria', $producto->getNombreCategoria());
        $consulta->execute();
        $resultado = $consulta->fetch();
    
        if ($resultado) {
            $idCategoria = $resultado['idCategoria'];
    
            // Paso 2: Insertar el producto usando el idCategoria encontrado
            $insert = $db->prepare('
                INSERT INTO Productos (idCategoria, imagen, nombreProducto, descripcionProducto, precioProducto, inventarioProducto, linkProducto)
                VALUES (:idCategoria, :imagen, :nombreProducto, :descripcionProducto, :precioProducto, :inventarioProducto, :linkProducto)
            ');
    
            $insert->bindValue('idCategoria', $idCategoria);
            $insert->bindValue('imagen', $producto->getImagen());
            $insert->bindValue('nombreProducto', $producto->getNombreProducto());
            $insert->bindValue('descripcionProducto', $producto->getDescripcionProducto());
            $insert->bindValue('precioProducto', $producto->getPrecioProducto());
            $insert->bindValue('inventarioProducto', $producto->getInventarioProducto());
            $insert->bindValue('linkProducto', $producto->getLinkProducto());
    
            $insert->execute();
        } else {
            header('Location: ../Vistas/ingresar.php?error=categoriainexistente');
            exit;
        }
    }
    

    // READ (Todos)
    public function mostrar(){
        $db = Db::conectar();
        $listaProductos = [];

        $select = $db->query('SELECT * FROM Productos INNER JOIN Categoria ON Productos.idCategoria = Categoria.idCategoria ORDER BY Productos.idProducto ASC');

        foreach($select->fetchAll() as $producto){
            $myProducto = new Productos();
            $myProducto->setIdProducto($producto['idProducto']);
            $myProducto->setIdCategoria($producto['idCategoria']);
            $myProducto->setNombreCategoria($producto['nombreCategoria']);
            $myProducto->setImagen($producto['imagen']);
            $myProducto->setNombreProducto($producto['nombreProducto']);
            $myProducto->setDescripcionProducto($producto['descripcionProducto']);
            $myProducto->setPrecioProducto($producto['precioProducto']);
            $myProducto->setInventarioProducto($producto['inventarioProducto']);
            $myProducto->setLinkProducto($producto['linkProducto']);
            $listaProductos[] = $myProducto;
        }

        return $listaProductos;
    }

    // READ (Uno)
    public function obtenerProducto($idProducto) {
        $db = Db::conectar();
    
        // Paso 1: Obtener todos los datos del producto
        $select = $db->prepare('SELECT * FROM Productos WHERE idProducto = :idProducto');
        $select->bindValue('idProducto', $idProducto);
        $select->execute();
        $producto = $select->fetch();
    
        if ($producto) {
            $myProducto = new Productos();
            $myProducto->setIdProducto($producto['idProducto']);
            $myProducto->setIdCategoria($producto['idCategoria']);
            $myProducto->setImagen($producto['imagen']);
            $myProducto->setNombreProducto($producto['nombreProducto']);
            $myProducto->setDescripcionProducto($producto['descripcionProducto']);
            $myProducto->setPrecioProducto($producto['precioProducto']);
            $myProducto->setInventarioProducto($producto['inventarioProducto']);
            $myProducto->setLinkProducto($producto['linkProducto']);
    
            // Paso 2: Obtener el nombre de la categoría desde el idCategoria
            $consultaCat = $db->prepare('SELECT nombreCategoria FROM Categoria WHERE idCategoria = :idCategoria');
            $consultaCat->bindValue('idCategoria', $producto['idCategoria']);
            $consultaCat->execute();
            $resultadoCat = $consultaCat->fetch();
    
            if ($resultadoCat) {
                $myProducto->setNombreCategoria($resultadoCat['nombreCategoria']);
            }
    
            return $myProducto;
        }
    
        return null;
    }
    

    // UPDATE
    public function actualizar($producto) {
        $db = Db::conectar();
    
        // Paso 1: Buscar el idCategoria a partir del nombreCategoria
        $consulta = $db->prepare('SELECT idCategoria FROM Categoria WHERE nombreCategoria = :nombreCategoria');
        $consulta->bindValue('nombreCategoria', $producto->getNombreCategoria());
        $consulta->execute();
        $resultado = $consulta->fetch();
    
        if ($resultado) {
            $idCategoria = $resultado['idCategoria'];
    
            // Paso 2: Actualizar el producto con el idCategoria correcto
            $actualizar = $db->prepare('UPDATE Productos SET 
                idCategoria = :idCategoria,
                imagen = :imagen,
                nombreProducto = :nombreProducto,
                descripcionProducto = :descripcionProducto,
                precioProducto = :precioProducto,
                inventarioProducto = :inventarioProducto,
                linkProducto = :linkProducto
                WHERE idProducto = :idProducto');
    
            $actualizar->bindValue('idProducto', $producto->getIdProducto());
            $actualizar->bindValue('idCategoria', $idCategoria);
            $actualizar->bindValue('imagen', $producto->getImagen());
            $actualizar->bindValue('nombreProducto', $producto->getNombreProducto());
            $actualizar->bindValue('descripcionProducto', $producto->getDescripcionProducto());
            $actualizar->bindValue('precioProducto', $producto->getPrecioProducto());
            $actualizar->bindValue('inventarioProducto', $producto->getInventarioProducto());
            $actualizar->bindValue('linkProducto', $producto->getLinkProducto());
    
            $actualizar->execute();
        } else {
            header('Location: ../Vistas/ingresar.php?error=categoriainexistente');
            exit;
        }
    }
    

    // DELETE
    public function eliminar($idProducto){
        $db = Db::conectar();
        $eliminar = $db->prepare('DELETE FROM Productos WHERE idProducto = :idProducto');
        $eliminar->bindValue('idProducto', $idProducto);
        $eliminar->execute();
    }
}
?>
