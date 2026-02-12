<?php
require_once('../Modelos/crudIngresos.php');
require_once('../Modelos/Ingresos.php');

$crud = new crudIngresos();
$ingreso = new Ingresos();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ingreso->setCorreo($_POST['correo']);
    $ingreso->setContrasena($_POST['contrasena']);

    $resultado = $crud->validarLogin($ingreso);

    if ($resultado == "admin") {
        header("Location: ../../Dueño/index.php");
    } elseif ($resultado == "cliente") {
        header("Location: ../../Contenido/Vistas/contenido.php");
    } elseif ($resultado == "contrasena_incorrecta") {
        header("Location: ../Vistas/login.php?error=contrasena_incorrecta");
    } elseif ($resultado == "correo_incorrecto") {
        header("Location: ../Vistas/login.php?error=correo_incorrecto");
    } else {
        echo $resultado; // Mensaje de error si falla
    }
    exit();
}
?>
