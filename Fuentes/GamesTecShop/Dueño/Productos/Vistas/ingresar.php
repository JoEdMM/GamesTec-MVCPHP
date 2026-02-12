<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregado de Productos - GamesTec</title>
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
			<strong align="center">Añadir un Nuevo Producto</strong><br>
		</div>
            <form action='../Controladores/admin_producto.php' method='post' enctype='multipart/form-data'>

        <div class="formulario">
            <table class="tablaFormulario">
                    <tr>
                        <td class="cambiocolor">Categoria:</td>
                        <td><input type='text' name="nombrecategoria" placeholder="Nombre de la categoría" required></td>
                    </tr>
                    <tr>
                        <td class="cambiocolor">Imagen:</td>
                        <td><input type='file' name='imagen'></td>
                    </tr>
                    <tr>
                        <td class="cambiocolor">Nombre:</td>
                        <td><input type='text' name='nombreproducto' placeholder="Nombre del Videojuego" required></td>
                    </tr>
                    <tr>
                        <td class="cambiocolor">Descripcion:</td>
                        <td><input type='text' name='descripcionproducto' placeholder="Descripción del Videojuego" required></td>
                    </tr>
                    <tr>
                        <td class="cambiocolor">Precio:</td>
                        <td><input type='number' name='precioproducto' size="4" min="0" max="9999"placeholder="Precio del Videojuego" required></td>
                    </tr>
                    <tr>
                        <td class="cambiocolor">Inventario:</td>
                        <td><input type='number' name='inventarioproducto' size="5" min="0" max="9999" placeholder="Número de Existencias del Videojuego"></td>
                    </tr>
                    <tr>
                        <td class="cambiocolor" colspan="2">
                            <label><strong>Si el VideoJuego tiene un Demo Web, ingrese el Enlace:</strong></label>
                        </td>
                    </tr>
                    <tr>
                        <td class="cambiocolor">Link:</td>
                        <td><input type='text' name='linkproducto' placeholder="Enlace de la Prueba del Videojuego"></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                        <?php if (isset($_GET['error']) && $_GET['error'] == 'categoriainexistente') {echo "<p style='color: red;'>La categoría no existe o no es correcta.</p>";} ?>
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
