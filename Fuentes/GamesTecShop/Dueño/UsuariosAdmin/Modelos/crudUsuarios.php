<?php
require_once('../../../config/conexion.php');
require_once('../Modelos/Usuarios.php');

class crudUsuarios {
    public function __construct() {}


    public function insertar($usuario){
        $db = Db::conectar();
    
        $correo = $usuario->getCorreoUsuario();
        $contrasenaHasheada = password_hash($usuario->getContrasenaUsuario(), PASSWORD_DEFAULT);
    
        $verificarCorreo = $db->prepare("SELECT COUNT(*) FROM Usuarios WHERE correoUsuario = ?");
        $verificarCorreo->execute([$correo]);
        $existeCorreo = $verificarCorreo->fetchColumn();
    
        if ($existeCorreo > 0) {
            header('Location: ../Vistas/ingresar.php?error=correo_duplicado');
            exit;
        }
    
    
        $insert = $db->prepare('INSERT INTO Usuarios (idUsuario, idTipoUsuario, correoUsuario, contrasenaUsuario) 
                                VALUES (:idUsuario, :idTipoUsuario, :correoUsuario, :contrasenaUsuario)');
    
        $insert->bindValue('idUsuario', $usuario->getIdUsuario());
        $insert->bindValue('idTipoUsuario', $usuario->getIdTipoUsuario());
        $insert->bindValue('correoUsuario', $correo);
        $insert->bindValue('contrasenaUsuario', $contrasenaHasheada);
        $insert->execute();
    }
    

    // READ (Todos)
    public function mostrar(){
        $db = Db::conectar();
        $listaUsuario = [];

        $select = $db->query('SELECT * FROM Usuarios WHERE IdTipoUsuario = 2');

        foreach($select->fetchAll() as $usuario){
            $myUsuario = new Usuarios();
            $myUsuario->setIdUsuario($usuario['idUsuario']);
            $myUsuario->setIdTipoUsuario($usuario['idTipoUsuario']);
            $myUsuario->setCorreoUsuario($usuario['correoUsuario']);
            $myUsuario->setContrasenaUsuario($usuario['contrasenaUsuario']);
            $listaUsuario[] = $myUsuario;
        }

        return $listaUsuario;
    }

    // READ (Uno)
    public function obtenerUsuario($idUsuario){
        $db = Db::conectar();
        $select = $db->prepare('SELECT * FROM Usuarios WHERE idUsuario = :idUsuario');
        $select->bindValue('idUsuario', $idUsuario);
        $select->execute();
        $usuario = $select->fetch();
    
        if (!$usuario) {
            header('Location: error.php');
            exit();
        }
    
        $myUsuario = new Usuarios();
        $myUsuario->setIdUsuario($usuario['idUsuario']);
        $myUsuario->setIdTipoUsuario($usuario['idTipoUsuario']);
        $myUsuario->setCorreoUsuario($usuario['correoUsuario']);
        $myUsuario->setContrasenaUsuario($usuario['contrasenaUsuario']);
    
        return $myUsuario;
    }
    

    // UPDATE
    public function actualizar($usuario){
        $db = Db::conectar();
    
        $idUsuario = $usuario->getIdUsuario();
        $correoNuevo = $usuario->getCorreoUsuario();
    
        $verificarCorreo = $db->prepare("SELECT COUNT(*) FROM Usuarios WHERE correoUsuario = :correo AND idUsuario != :id");
        $verificarCorreo->bindValue('correo', $correoNuevo);
        $verificarCorreo->bindValue('id', $idUsuario);
        $verificarCorreo->execute();
        $existeCorreo = $verificarCorreo->fetchColumn();
    
        if ($existeCorreo > 0) {
            header('Location: ../Vistas/mostrar.php?error=correo_duplicado');
            exit;
        }
    
        // Hashear la nueva contraseña
        $contrasenaHasheada = password_hash($usuario->getContrasenaUsuario(), PASSWORD_DEFAULT);
    
        $actualizar = $db->prepare('UPDATE Usuarios SET 
            idTipoUsuario = :idTipoUsuario,
            correoUsuario = :correoUsuario,
            contrasenaUsuario = :contrasenaUsuario
            WHERE idUsuario = :idUsuario');
    
        $actualizar->bindValue('idUsuario', $idUsuario);
        $actualizar->bindValue('idTipoUsuario', $usuario->getIdTipoUsuario());
        $actualizar->bindValue('correoUsuario', $correoNuevo);
        $actualizar->bindValue('contrasenaUsuario', $contrasenaHasheada);
        $actualizar->execute();
    }
    
    

    // DELETE
    public function eliminar($idUsuario){
        $db = Db::conectar();
        $eliminar = $db->prepare('DELETE FROM Usuarios WHERE idUsuario = :idUsuario');
        $eliminar->bindValue('idUsuario', $idUsuario);
        $eliminar->execute();
    }
    
}
?>
