<?php
require_once('Controlador/admin_dueño.php');
?>
<html>
	<head>
		<meta charset="UTF-8">
    	<title>Panel de Inicio - GamesTec</title>
    	<link rel="stylesheet" href="styleAdmin.css">
	</head>

	<body>
		<header>
			<div class="header-grid">
				<div class="logo-container">
					<img src="../img/GamesTecLogo.png" alt="GamesTec Logo">
					<h1>GamesTec</h1>
				</div>
				<div class="admin">
					<h2>Administración</h2>
				</div>
				<nav>
					<a href="../Acceso/Controlador/admin_logout.php">Cerrar Sesión</a>
				</nav>
			</div>
		</header>
			<main>
				<div class="container">
					<div class="opciones"><a href="UsuariosAdmin/Vistas/mostrar.php">Usuarios</a></div>
					<div class="opciones"><a href="Clientes/Vistas/mostrar.php">Clientes</a></div>
					<div class="opciones"><a href="Categoria/Vistas/mostrar.php">Categorías</a></div>
					<div class="opciones"><a href="Productos/Vistas/mostrar.php">Productos</a></div>
					<div class="opciones"><a href="InfoVentas/Vistas/mostrar.php">Ventas</a></div>

				</div>
			</main>
		<footer>
			Elaborado por:<br>
			Jonathan Eduardo Moo Mijares<br>
			Jorge Daniel Alvarado Ramírez<br>
			Erick Eduardo Salas Trejo<br>
		</footer>
	</body>
</html>






<!--


 <html>
    <head>
        <title>Conexión a la Base de Datos</title>
    </head>
<body>
 
</body>
</html>
-->
