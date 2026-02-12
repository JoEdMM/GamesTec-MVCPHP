<?php 
require_once('../../config/conexion.php');
require_once('../Modelos/Categorias.php');

class readCategorias {
    public function __construct() {}


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

    
}
?>
