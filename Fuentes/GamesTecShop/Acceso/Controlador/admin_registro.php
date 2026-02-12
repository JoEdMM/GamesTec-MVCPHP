<?php
require_once('../Modelos/crudRegistros.php');
require_once('../Modelos/Registros.php');

$crud = new crudRegistros();
$registro = new Registros();

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action == 'registrar') {
        $registro->setUsuario($_POST['usuario']);
        $registro->setPrimerApellido($_POST['primerApellido']);
        $registro->setSegundoApellido($_POST['segundoApellido']);
        $registro->setCorreo($_POST['correo']);
        $registro->setContrasena($_POST['contrasena']);
        $registro->setConfirmar($_POST['confirmar']);

        // Guardar el resultado del método registrar()
        $resultado = $crud->registrar($registro);

        if ($resultado == 'correo_duplicado') {
            header('Location: ../Vistas/register.php?error=correo_duplicado');
        } elseif ($resultado == 'contrasenas') {
            header('Location: ../Vistas/register.php?error=contrasenas');
        } elseif ($resultado == 'ok') {
            header('Location: ../Vistas/login.php?exito=registro');
        } else {
            echo "Error al registrar: $resultado";
        }
        exit();
    }
}
?>
