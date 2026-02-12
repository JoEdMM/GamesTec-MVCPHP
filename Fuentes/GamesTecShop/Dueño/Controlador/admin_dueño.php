<?php
session_start();
if (!isset($_SESSION['idUsuario'])) {
    header("Location: Acceso/login.php?error=Debes iniciar sesión");
    exit;
}