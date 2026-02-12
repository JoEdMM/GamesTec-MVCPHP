<?php
	//incluye la clase Libro y CrudLibro
require_once('../Modelos/crudVentas.php');
require_once('../Modelos/Ventas.php');

$crud = new crudVentas();
$venta = new Ventas();
$listaVenta = $crud->mostrarVentas();
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
				<strong align="center">Administración de las Ventas de los Clientes</strong><br>
			</div>

			<div class="tabla-responsive">
				<table>
					<thead>
						<tr>
							<th>Id de la Venta</th>
							<th>Id del Cliente</th>
							<th>Id de la Tarjeta</th>
							<th>Total</th>
							<th>Fecha</th>

							
						</tr>
					</thead>
					<tbody>
						<?php foreach ($listaVenta as $venta) {?>
							<tr>
								<td align="center"><?php echo $venta->getIdVenta() ?></td>
								<td align="center"><?php echo $venta->getIdCliente() ?></td>
								<td align="center"><?php echo $venta->getIdTarjeta() ?></td>
								<td align="center"><?php echo $venta->getTotal() ?></td>
								<td align="center"><?php echo $venta->getFecha() ?></td>

								
							</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</main>		
	<footer class="responsivo">
	<div class="botones-inferiores">
		<a href="../../index.php"><button type="button" >Regresar</button></a>
            
    	<a href="imprimir.php"><button>Imprime</button></a>
        </div>
    </footer>
</body>
</html>
