<?php
require_once('../../../config/conexion.php');
require_once('../Modelos/Clientes.php');

class crudClientes {
    public function __construct() {}

    // READ (Todos)
    public function mostrar(){
        $db = Db::conectar();
        $listaCliente = [];

        $select = $db->query('SELECT * FROM Clientes');

        foreach($select->fetchAll() as $cliente){
            $myCliente = new Clientes();
            $myCliente->setIdCliente($cliente['idCliente']);
            $myCliente->setIdUsuario($cliente['idUsuario']);
            $myCliente->setNombreUsuario($cliente['nombreUsuario']);
            $myCliente->setPrimerApellidoUsuario($cliente['primerApellidoUsuario']);
            $myCliente->setSegundoApellidoUsuario($cliente['segundoApellidoUsuario']);
            $listaCliente[] = $myCliente;
        }

        return $listaCliente;
    }

    // READ (Uno)
    public function obtenerCliente($idCliente){
        $db = Db::conectar();
    
        // Hacemos un JOIN para traer también el correo del usuario
        $select = $db->prepare('
            SELECT c.*, u.correoUsuario
            FROM Clientes c
            JOIN Usuarios u ON c.idUsuario = u.idUsuario
            WHERE c.idCliente = :idCliente
        ');
    
        $select->bindValue(':idCliente', $idCliente);
        $select->execute();
        $cliente = $select->fetch();
    
        if (!$cliente) {
            header('Location: error.php');
            exit();
        }
    
        $myCliente = new Clientes();
        $myCliente->setIdCliente($cliente['idCliente']);
        $myCliente->setIdUsuario($cliente['idUsuario']);
        $myCliente->setNombreUsuario($cliente['nombreUsuario']);
        $myCliente->setPrimerApellidoUsuario($cliente['primerApellidoUsuario']);
        $myCliente->setSegundoApellidoUsuario($cliente['segundoApellidoUsuario']);
    
        // Necesitarás agregar este método en tu clase Clientes
        $myCliente->setCorreoUsuario($cliente['correoUsuario']);
    
        return $myCliente;
    }
    

    // UPDATE
    public function actualizar($cliente) {
        $db = Db::conectar();
    
        // 1. Actualizar datos del Cliente
        $actualizarCliente = $db->prepare('UPDATE Clientes SET 
            nombreUsuario = :nombreUsuario,
            primerApellidoUsuario = :primerApellidoUsuario,
            segundoApellidoUsuario = :segundoApellidoUsuario
            WHERE idCliente = :idCliente');
    
        $actualizarCliente->bindValue(':nombreUsuario', $cliente->getNombreUsuario());
        $actualizarCliente->bindValue(':primerApellidoUsuario', $cliente->getPrimerApellidoUsuario());
        $actualizarCliente->bindValue(':segundoApellidoUsuario', $cliente->getSegundoApellidoUsuario());
        $actualizarCliente->bindValue(':idCliente', $cliente->getIdCliente());
        $actualizarCliente->execute();
    
        // 2. Actualizar correo en la tabla Usuarios
        $actualizarUsuario = $db->prepare('UPDATE Usuarios SET 
            correoUsuario = :correoUsuario
            WHERE idUsuario = :idUsuario');
    
        $actualizarUsuario->bindValue(':correoUsuario', $cliente->getCorreoUsuario());
        $actualizarUsuario->bindValue(':idUsuario', $cliente->getIdUsuario());
        $actualizarUsuario->execute();
    }
    

    // DELETE
    public function eliminar($idCliente){
        $db = Db::conectar();
    
        // 1. Obtener el idUsuario relacionado con el Cliente
        $consulta = $db->prepare('SELECT idUsuario FROM Clientes WHERE idCliente = :idCliente');
        $consulta->bindValue(':idCliente', $idCliente);
        $consulta->execute();
        $resultado = $consulta->fetch();
    
        if ($resultado) {
            $idUsuario = $resultado['idUsuario'];
    
            // 2. Eliminar al Cliente
            $eliminarCliente = $db->prepare('DELETE FROM Clientes WHERE idCliente = :idCliente');
            $eliminarCliente->bindValue(':idCliente', $idCliente);
            $eliminarCliente->execute();
    
            // 3. Eliminar al Usuario
            $eliminarUsuario = $db->prepare('DELETE FROM Usuarios WHERE idUsuario = :idUsuario');
            $eliminarUsuario->bindValue(':idUsuario', $idUsuario);
            $eliminarUsuario->execute();
        }
    }
    
}
?>
