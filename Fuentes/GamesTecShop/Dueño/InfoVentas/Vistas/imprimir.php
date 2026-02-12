<?php
	//incluye la clase Libro y CrudLibro
require_once('../Modelos/crudVentas.php');
require_once('../Modelos/Ventas.php');

$crud = new crudVentas();
$venta = new Ventas();
$listaVenta = $crud->mostrarDetalleVentas();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Ventas de los Clientes - GamesTec</title>
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
				<strong align="center">Detalle de las Ventas de los Clientes</strong><br>
			</div>

			<div class="tabla-responsive">
				<div class="cambiolineas">
				<table>
					<thead>
						<tr>
							<th>Id del Detalle</th>
							<th>Id de la Venta</th>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Precio Unitario</th>

						</tr>
					</thead>
					<tbody>
						<?php foreach ($listaVenta as $venta) {?>

							<tr>
								<td align="center"><?php echo $venta->getIdDetalle() ?></td>
								<td align="center"><?php echo $venta->getIdVenta() ?></td>
								<td align="center"><?php echo $venta->getNombreProducto() ?></td>
								<td align="center"><?php echo $venta->getCantidad() ?></td>
								<td align="center"><?php echo $venta->getPrecioUnitario() ?></td>
								
							</tr>
						<?php }?>
					</tbody>
				</table>	
				</div>
	<br><br>
	</div>
		</main>		
	<footer class="responsivo">
	<div class="botones-inferiores">
		<a href="mostrar.php"><button type="button" >Regresar</button></a>
            
        </div>
    </footer>
</body>
</html>
