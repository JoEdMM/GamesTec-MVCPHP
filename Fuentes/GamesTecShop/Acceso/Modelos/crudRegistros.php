<?php
require_once('../../config/conexion.php');
require_once('../Modelos/Registros.php');

class crudRegistros {
    public static function registrar($registro) {
        try {
            $db = Db::conectar();

            // Validar si el correo ya existe
            $consulta = $db->prepare("SELECT COUNT(*) FROM Usuarios WHERE correoUsuario = ?");
            $consulta->execute([$registro->getCorreo()]);
            if ($consulta->fetchColumn() > 0) {
                return 'correo_duplicado';
            }

            // Validar contraseñas
            if ($registro->getContrasena() !== $registro->getConfirmar()) {
                return 'contrasenas';
            }

            $db->beginTransaction();

            $hash = password_hash($registro->getContrasena(), PASSWORD_DEFAULT);

            $insertUsuario = $db->prepare("INSERT INTO Usuarios (correoUsuario, contrasenaUsuario, idTipoUsuario) VALUES (?, ?, 1)");
            $insertUsuario->execute([$registro->getCorreo(), $hash]);

            $idUsuario = $db->lastInsertId();

            $insertCliente = $db->prepare("INSERT INTO Clientes (idUsuario, nombreUsuario, primerApellidoUsuario, segundoApellidoUsuario) VALUES (?, ?, ?, ?)");
            $insertCliente->execute([
                $idUsuario,
                $registro->getUsuario(),
                $registro->getPrimerApellido(),
                $registro->getSegundoApellido()
            ]);

            $db->commit();
            return 'ok';

        } catch (Exception $e) {
            if ($db->inTransaction()) {
                $db->rollBack();
            }
            return $e->getMessage();
        }
    }
}
?>