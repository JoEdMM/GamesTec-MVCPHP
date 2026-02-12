<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregado de Categorías - GamesTec</title>
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
			<strong align="center">Añadir una Nueva Categoría</strong><br>
		</div>
            <form action='../Controladores/admin_categoria.php' method='post' enctype='multipart/form-data'>

        <div class="formulario">
            <table class="tablaFormulario">

                    <tr>
                        <td class="cambiocolor">Categoria:</td>
                        <td><input type='text' name="nombrecategoria" placeholder="Nombre de la categoría" required></td>
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
