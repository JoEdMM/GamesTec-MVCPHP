<?php
class Usuarios {
    private $idUsuario;
    private $idTipoUsuario;
    private $correoUsuario;
    private $contrasenaUsuario;

    // ID
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    // ID
    public function getIdTipoUsuario() {
        return $this->idTipoUsuario;
    }

    public function setIdTipoUsuario($idTipoUsuario) {
        $this->idTipoUsuario = $idTipoUsuario;
    }

    // Correo
    public function getCorreoUsuario() {
        return $this->correoUsuario;
    }

    public function setCorreoUsuario($correoUsuario) {
        $this->correoUsuario = $correoUsuario;
    }

    // Contraseña
    public function getContrasenaUsuario() {
        return $this->contrasenaUsuario;
    }

    public function setContrasenaUsuario($contrasenaUsuario) {
        $this->contrasenaUsuario = $contrasenaUsuario;
    }
}
