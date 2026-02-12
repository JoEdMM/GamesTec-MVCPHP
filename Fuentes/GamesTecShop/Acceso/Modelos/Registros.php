<?php

class Registros {
    private $usuario;
    private $primerApellido;
    private $segundoApellido;
    private $correo;
    private $contrasena;
    private $confirmar;

    // Getters y Setters
    public function getUsuario() { return $this->usuario; }
    public function setUsuario($u) { $this->usuario = $u; }

    public function getPrimerApellido() { return $this->primerApellido; }
    public function setPrimerApellido($p) { $this->primerApellido = $p; }

    public function getSegundoApellido() { return $this->segundoApellido; }
    public function setSegundoApellido($s) { $this->segundoApellido = $s; }

    public function getCorreo() { return $this->correo; }
    public function setCorreo($c) { $this->correo = $c; }

    public function getContrasena() { return $this->contrasena; }
    public function setContrasena($c) { $this->contrasena = $c; }

    public function getConfirmar() { return $this->confirmar; }
    public function setConfirmar($c) { $this->confirmar = $c; }
}