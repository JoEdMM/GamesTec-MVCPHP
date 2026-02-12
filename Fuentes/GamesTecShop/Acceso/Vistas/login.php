<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - GamesTec</title>
    <link rel="stylesheet" href="../../styles.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="../../img/GamesTecLogo.png" alt="GamesTec Logo">
            <h1>GamesTec</h1>
        </div>
    </header>

    <main class="form-main">
        <form action="../Controlador/admin_login.php?action=login" method="POST" class="auth-form">
            <h2>Iniciar Sesión</h2>
            <input type="email" name="correo" placeholder="Correo electrónico" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <input type="submit" value="Entrar">
            <p>¿No tienes cuenta? <a href="register.php">Regístrate</a></p>

            <?php
                if (isset($_GET['exito']) && $_GET['exito'] == 'registro') {
                echo "<p style='color: green;'>Registro exitoso.</p>";
                }

                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'contrasena_incorrecta') {
                        echo "<p style='color: red;'>Las contraseñas es incorrecta.</p>";
                    } elseif ($_GET['error'] == 'correo_incorrecto') {
                        echo "<p style='color: red;'>No existe este correo.</p>";
                    }
                }
            ?>
        </form>
    </main>

    <footer>
        <p>© 2025 GamesTec. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
