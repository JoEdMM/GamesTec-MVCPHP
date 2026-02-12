<?php
class Clientes {
    private $idCliente;
    private $idUsuario;
    private $nombreUsuario;
    private $primerApellidoUsuario;
    private $segundoApellidoUsuario;
    private $correoUsuario;

    // ID
    public function getIdCliente() {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    // ID
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    // Nombre
    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    // Primer Apellido
    public function getPrimerApellidoUsuario() {
        return $this->primerApellidoUsuario;
    }

    public function setPrimerApellidoUsuario($primerApellidoUsuario) {
        $this->primerApellidoUsuario = $primerApellidoUsuario;
    }

    // Segundo Apellido
    public function getSegundoApellidoUsuario() {
        return $this->segundoApellidoUsuario;
    }

    public function setSegundoApellidoUsuario($segundoApellidoUsuario) {
        $this->segundoApellidoUsuario = $segundoApellidoUsuario;
    }

    // Correo
    public function getCorreoUsuario() {
        return $this->correoUsuario;
    }

    public function setCorreoUsuario($correoUsuario) {
        $this->correoUsuario = $correoUsuario;
    }
}