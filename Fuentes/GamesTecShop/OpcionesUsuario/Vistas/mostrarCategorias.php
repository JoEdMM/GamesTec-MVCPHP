<?php
//incluye la clase Libro y CrudLibro
require_once('../Modelos/readCategorias.php');
require_once('../Modelos/Categorias.php');
$crud= new readCategorias();
$categoria= new Categorias();
//obtiene todos los libros con el método mostrar de la clase crud
$listaCategorias=$crud->mostrar();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Productos en Tienda - GamesTec</title>
    <link rel="stylesheet" href="../../styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bodyCarrito">
<header>
        <div class="logo-container">
            <img src="../../img/GamesTecLogo.png" alt="GamesTec Logo">
            <h1>GamesTec</h1>
        </div>

        <div class="subtitulo">
				<strong align="center">Formulario de Pago</strong><br>
			</div>
        <nav>
            <a href="../../Contenido/Vistas/contenido.php">Volver a la tienda</a>
        </nav>
    </header>

	<main class="scroll">
	<div class="contenedorCategorias">
		<table>
			<div class="grid-categorias">
            <?php foreach ($listaCategorias as $categoria): ?>
    <div class="categoria" align="center">
        <a href="../../Contenido/Vistas/contenido.php?categoria=<?= $categoria->getIdCategoria() ?>">
            <h2><?= htmlspecialchars($categoria->getNombreCategoria()) ?></h2>
        </a>
    </div>
<?php endforeach; ?>

			</div>
		</table>
	</div>
</main>

<footer class="responsivo">
            <p>© 2025 GamesTec. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
