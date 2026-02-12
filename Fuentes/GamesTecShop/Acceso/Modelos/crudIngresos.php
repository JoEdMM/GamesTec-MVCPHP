<?php
require_once('../../config/conexion.php');
require_once('../Modelos/Ingresos.php');

class crudIngresos {
    public function validarLogin($ingreso) {
        $db = Db::conectar();
        $correo = $ingreso->getCorreo();
        $contrasena = $ingreso->getContrasena();

        try {
            $query = $db->prepare("SELECT * FROM Usuarios WHERE correoUsuario = ?");
            $query->execute([$correo]);
            $usuario = $query->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                if (password_verify($contrasena, $usuario['contrasenaUsuario'])) {
                    // Sesión válida
                    session_start();
                    $_SESSION['idUsuario'] = $usuario['idUsuario'];
                    $_SESSION['correo'] = $usuario['correoUsuario'];
                    $_SESSION['rol'] = $usuario['idTipoUsuario'];

                    if ($usuario['idTipoUsuario'] == 2) {
                        return "admin";
                    } else {
                        return "cliente";
                    }
                } else {
                    return "contrasena_incorrecta";
                }
            } else {
                return "correo_incorrecto";
            }
        } catch (PDOException $e) {
            return "error: " . $e->getMessage();
        }
    }
}
?>
