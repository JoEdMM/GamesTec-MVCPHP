<?php
	//incluye la clase Libro y CrudLibro
	require_once('../Modelos/crudUsuarios.php');
	require_once('../Modelos/Usuarios.php');
	$crud= new crudUsuarios();
	$usuario= new Usuarios();
//obtiene todos los libros con el método mostrar de la clase crud
$listaUsuario=$crud->mostrar();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Clientes en Tienda - GamesTec</title>
    <link rel="stylesheet" href="../../styleAdmin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
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
				<strong align="center">Administración Usuario Moderadores</strong><br>
			</div>

			<div class="tabla-responsive">
				<table>
					<thead>
						<tr>
							<th>Identificador</th>
							<th>Correo Usuario</th>
							<th>Contraseña Usuario</th>
							<th>Visualiza</th>	
							<th>Edita</th>	
							<th>Borra</th>	
						</tr>
					</thead>
					<tbody>
						<?php foreach ($listaUsuario as $usuario) {?>
							<tr>
								<td align="center"><?php echo $usuario->getIdUsuario() ?></td>
								<td align="center"><?php echo $usuario->getCorreoUsuario() ?></td>
								<td align="center"><?php echo $usuario->getContrasenaUsuario() ?></td>

								<td align="center"><a href="visualizar.php?idusuario=<?php echo $usuario->getIdUsuario()?>">
									<img src="../../imagenes/visualiza.jpg" alt="Visualizar" width="24" height="24"></a> </td>
								<td align="center"><a href="actualizar.php?idusuario=<?php echo $usuario->getIdUsuario()?>&accion=a">
									<img src="../../imagenes/edita.png" alt="Editar" width="24" height="24"></a> </td>	
								<td align="center"><a href="borrar.php?idusuario=<?php echo $usuario->getIdUsuario()?>&accion=e">
								<img src="../../imagenes/borra.jpg" alt="Borrar" width="24" height="24"></a> </td>	
	
							</tr>
						<?php } ?>
					</tbody>
			<div align="center">
					<?php
			
                if (isset($_GET['error']) && $_GET['error'] == 'correo_duplicado') {echo "<p style='color: red;'>No puedes repetir correos.</p>";}

            	?>
				</table>
			</div>		
			</div>
		</main>		
	<footer class="responsivo">
	<div class="botones-inferiores">
		<a href="ingresar.php"><button>Nuevo</button></a>		
		<a href="../../index.php"><button type="button" >Regresar</button></a>
            
            <!-- <a href="imprimir.php"><button>Imprime</button></a>-->
        </div>
    </footer>
    </footer>
</body>
</html>
