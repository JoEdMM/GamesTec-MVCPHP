

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - GamesTec</title>
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
        <form action="../Controlador/admin_registro.php?action=registrar" method="POST" class="auth-form">
            <h2>Registrarse</h2>
            <input type="text" name="usuario" placeholder="Nombre de usuario" required>
            <input type="text" name="primerApellido" placeholder="Primer apellido" required>
            <input type="text" name="segundoApellido" placeholder="Segundo apellido">
            <input type="email" name="correo" placeholder="Correo electrónico" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required minlength="8">
            <input type="password" name="confirmar" placeholder="Confirmar contraseña" required>
            <input type="submit" value="Registrar">
            <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>

            
            <?php
            //fragmento de php para que mande un mensaje de error si existe un correo duplicado.
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'contrasenas') {
                        echo "<p style='color: red;'>Las contraseñas no coinciden.</p>";
                    } elseif ($_GET['error'] == 'correo_duplicado') {
                        echo "<p style='color: red;'>El correo ya está en uso.</p>";
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


