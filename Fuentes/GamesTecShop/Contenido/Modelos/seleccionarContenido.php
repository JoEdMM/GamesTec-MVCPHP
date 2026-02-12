<?php
require_once('../../config/conexion.php');

class seleccionarContenido {
    private $db;

    public function __construct() {
        $this->db = Db::conectar();
    }

    public function obtenerCategorias() {
        $query = $this->db->prepare("SELECT * FROM Categoria WHERE idCategoria IN (1, 2, 3, 4, 5)");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerProductos($idCategoria = null) {
        if ($idCategoria) {
            $query = $this->db->prepare("SELECT * FROM Productos WHERE idCategoria = :idCategoria");
            $query->bindParam(':idCategoria', $idCategoria, PDO::PARAM_INT);
        } else {
            $query = $this->db->prepare("SELECT * FROM Productos");
        }

        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
