<?php
	//incluye la clase Libro y CrudLibro
	require_once('../Modelos/crudClientes.php');
	require_once('../Modelos/Clientes.php');
	$crud= new crudClientes();
	$cliente= new Clientes();
//obtiene todos los libros con el método mostrar de la clase crud
$listaCliente=$crud->mostrar();
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
				<strong align="center">Administración Clientes</strong><br>
			</div>

			<div class="tabla-responsive">
				<table>
					<thead>
						<tr>
							<th>Identificador</th>
							<th>Nombre Cliente</th>
							<th>Apellido Materno</th>
							<th>Apellido Paterno</th>
							<th>Visualiza</th>	
							<th>Edita</th>	
							<th>Borra</th>	
						</tr>
					</thead>
					<tbody>
						<?php foreach ($listaCliente as $cliente) {?>
							<tr>
								<td align="center"><?php echo $cliente->getIdCliente() ?></td>
								<td align="center"><?php echo $cliente->getNombreUsuario() ?></td>
								<td align="center"><?php echo $cliente->getPrimerApellidoUsuario() ?></td>
								<td align="center"><?php echo $cliente->getSegundoApellidoUsuario() ?></td>

								<td align="center"><a href="visualizar.php?idcliente=<?php echo $cliente->getIdCliente()?>">
									<img src="../../imagenes/visualiza.jpg" alt="Visualizar" width="24" height="24"></a> </td>
								<td align="center"><a href="actualizar.php?idcliente=<?php echo $cliente->getIdCliente()?>&accion=a">
									<img src="../../imagenes/edita.png" alt="Editar" width="24" height="24"></a> </td>	
								<td align="center"><a href="borrar.php?idcliente=<?php echo $cliente->getIdCliente()?>&accion=e">
								<img src="../../imagenes/borra.jpg" alt="Borrar" width="24" height="24"></a> </td>		
							</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</main>		
	<footer class="responsivo">
	<div class="botones-inferiores">
		<a href="../../index.php"><button type="button" >Regresar</button></a>
            
            <!-- <a href="imprimir.php"><button>Imprime</button></a>-->
        </div>
    </footer>
</body>
</html>
