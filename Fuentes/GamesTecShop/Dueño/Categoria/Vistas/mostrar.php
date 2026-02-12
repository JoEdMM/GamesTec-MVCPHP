<?php
//incluye la clase Libro y CrudLibro
require_once('../Modelos/crudCategorias.php');
require_once('../Modelos/Categorias.php');
$crud= new crudCategorias();
$categoria= new Categorias();
//obtiene todos los libros con el método mostrar de la clase crud
$listaCategorias=$crud->mostrar();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Productos en Tienda - GamesTec</title>
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
				<strong align="center">Administración Categorias</strong><br>
			</div>

			<div class="tabla-responsive">
				<table>
					<thead>
						<tr>
							<th>Identificador</th>
							<th>Nombre</th>
							<th>Visualiza</th>
							<th>Edita</th>	
							<th>Borra</th>	
						</tr>
					</thead>
					<tbody>
						<?php foreach ($listaCategorias as $categoria) {?>
							<tr>
					
								<td align="center"><?php echo $categoria->getIdCategoria() ?></td>
								<td align="center"><?php echo $categoria->getNombreCategoria() ?></td>

								<td align="center"><a href="visualizar.php?idcategoria=<?php echo $categoria->getIdCategoria()?>">
									<img src="../../imagenes/visualiza.jpg" alt="Visualizar" width="24" height="24"></a> </td>
								<td align="center"><a href="actualizar.php?idcategoria=<?php echo $categoria->getIdCategoria()?>&accion=a">
									<img src="../../imagenes/edita.png" alt="Editar" width="24" height="24"></a> </td>	
								<td align="center"><a href="borrar.php?idcategoria=<?php echo $categoria->getIdCategoria()?>&accion=e">
								<img src="../../imagenes/borra.jpg" alt="Borrar" width="24" height="24"></a> </td>		
							</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</main>		
	<footer class="responsivo">
	<div class="botones-inferiores">
		<a href="ingresar.php"><button>Nuevo</button></a>		
		<a href="../../index.php"><button type="button" >Regresar</button></a>
            
            <!-- <a href="imprimir.php"><button>Imprime</button></a>-->
        </div>
    </footer>
</body>
</html>
