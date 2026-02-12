<?php
require_once('../../../config/conexion.php');
require_once('../Modelos/Categorias.php');

class crudCategorias {
    public function __construct() {}

    // CREATE
    public function insertar($categoria){
        $db = Db::conectar();
        $insert = $db->prepare('INSERT INTO Categoria (idCategoria, nombreCategoria) 
        VALUES (:idCategoria, :nombreCategoria)');
        $insert->bindValue('idCategoria', $categoria->getIdCategoria());
        $insert->bindValue('nombreCategoria', $categoria->getNombreCategoria());
        $insert->execute();
    }

    // READ (Todos)
    public function mostrar(){
        $db = Db::conectar();
        $listaCategorias = [];

        $select = $db->query('SELECT * FROM Categoria');

        foreach($select->fetchAll() as $categoria){
            $myCategoria = new Categorias();
            $myCategoria->setIdCategoria($categoria['idCategoria']);
            $myCategoria->setNombreCategoria($categoria['nombreCategoria']);
            $listaCategorias[] = $myCategoria;
        }

        return $listaCategorias;
    }

    // READ (Uno)
    public function obtenerCategoria($idCategoria){
        $db = Db::conectar();
        $select = $db->prepare('SELECT * FROM Categoria WHERE idCategoria = :idCategoria');
        $select->bindValue('idCategoria', $idCategoria);
        $select->execute();
        $categoria = $select->fetch();

        if(!$categoria){
            header('Location: error.php');
            exit();
        }

        $myCategoria = new Categorias();
        $myCategoria->setIdCategoria($categoria['idCategoria']);
        $myCategoria->setNombreCategoria($categoria['nombreCategoria']);
        return $myCategoria;
    }

    // UPDATE
    public function actualizar($categoria){
        $db = Db::conectar();

        $actualizar = $db->prepare('UPDATE Categoria SET 
            idCategoria = :idCategoria,
            nombreCategoria = :nombreCategoria
            WHERE idCategoria = :idCategoria');

        $actualizar->bindValue('idCategoria', $categoria->getIdCategoria());
        $actualizar->bindValue('nombreCategoria', $categoria->getNombreCategoria());
        $actualizar->execute();
    }

    // DELETE
    public function eliminar($idCategoria){
        $db = Db::conectar();
        $eliminar = $db->prepare('DELETE FROM Categoria WHERE idCategoria = :idCategoria');
        $eliminar->bindValue('idCategoria', $idCategoria);
        $eliminar->execute();
    }
}
?>
