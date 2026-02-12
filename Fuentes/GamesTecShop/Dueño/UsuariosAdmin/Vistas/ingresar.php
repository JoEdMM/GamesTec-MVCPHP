<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregado de Usuarios Moderadores - GamesTec</title>
    <link rel="stylesheet" href="../../styleAdmin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="bodyFormualario">
    <header>
        <div class="header-grid">
            <div class="logo-container">
                <img src="../../../img/GamesTecLogo.png" alt="GamesTec Logo">
                <h1>GamesTec</h1>
            </div>
            <div class="admin">
                <h2>Administración</h2>
            </div>
        </div>
    </header>

    <main class="scroll">
		<div class="subtitulo">
			<strong align="center">Añadir un Usuario Moderador</strong><br>
		</div>
            <form action='../Controladores/admin_usuario.php' method='post'>

        <div class="formulario">
            <table class="tablaFormulario">
                    
                    <tr>
                        <input type='hidden' name='idtipousuario' value='2'>
                        <td class="cambiocolor">Correo Usuario:</td>
                        <td><input type='text' name="correousuario" placeholder="Correo Usuario" required></td>
                    </tr>
                    <tr>
                        <td class="cambiocolor">Contraseña Usuario:</td>
                        <td><input type='text' name="contrasenausuario" minlength="8" placeholder="Contraseña Usuario" required></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                    <?php
                        if (isset($_GET['error']) && $_GET['error'] == 'correo_duplicado') {echo "<p style='color: red;'>El correo ya está en uso.</p>";}

                    ?>
                        </td>
                    </tr>
                    <input type='hidden' name='insertar' value='insertar'>
            </table>
            
    </div>
	</main>

    <footer class="responsivo">		
        <div class="botones-inferiores">
                <input type='submit' value='Guardar'>
</form>
                <a href="mostrar.php"><button>Cancelar</button></a>
        </div>
    </footer>
</body>
</html>
