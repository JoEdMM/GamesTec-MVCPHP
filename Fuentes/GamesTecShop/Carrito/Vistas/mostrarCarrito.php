<?php
session_start();
require_once('../Modelos/crudCarritos.php');
$crud = new crudCarritos();

if (!isset($_SESSION['idUsuario'])) {
    header("Location: ../Acceso/login.php?error=Debes iniciar sesión");
    exit;
}

$idUsuario = $_SESSION['idUsuario'];
$idCarrito = $crud->obtenerCarritoActivo($idUsuario);

if (!$idCarrito) {
    $mensaje = "Por favor, agrega algun producto al carrito.";
} else {
    $detalles = $crud->obtenerDetallesCarrito($idCarrito);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tu Carrito - GamesTec</title>
    <link rel="stylesheet" href="../../styles.css">
</head>
<body class="bodyCarrito">
    <header>
        <div class="logo-container">
            <img src="../../img/GamesTecLogo.png" alt="GamesTec Logo">
            <h1>GamesTec</h1>
        </div>

        <div class="subtitulo">
				<strong align="center">Carrito</strong><br>
			</div>
        <nav>
            <a href="../../Contenido/Vistas/contenido.php">Volver a la tienda</a>
        </nav>
    </header>

    <main class="scroll">
        <?php
        if (isset($_GET['success'])) {
            echo '<p class="success">' . htmlspecialchars($_GET['success']) . '</p>';
        } elseif (isset($_GET['error'])) {
            echo '<p class="error">' . htmlspecialchars($_GET['error']) . '</p>';
        }

        if (isset($mensaje)) {
            echo '<div class="mensaje">';
            echo "<h2>¡No Tienes Productos En Tu Carrito!</h2>";
            echo "<p>$mensaje</p>";
            echo '</div>';
            echo '<div class="botonesCarrito">';
                echo "<li><a href='../../Contenido/Vistas/contenido.php?action=vaciar'>Agregar más</a></li>";
            echo '</div>';
            } else {
            echo '<div class="tabla-responsive">';
            echo '<table cellpadding="10" cellspacing="0">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>';
            echo '</div>';
            $total = 0;
            foreach ($detalles as $row) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['nombreProducto']) . "</td>
                        <td>{$row['cantidadProductos']}</td>
                        <td>$" . number_format($row['precioUnitario'], 2) . "</td>
                        <td>$" . number_format($row['subtotal'], 2) . "</td>
                      </tr>";
                $total += $row['subtotal'];
            }
               // Fila del total
    echo "<tr>
    <td class='total' colspan='3'><strong>Total</strong></td>
    <td><strong>$" . number_format($total, 2) . "</strong></td>
  </tr>";

// Fila con los botones como enlaces
echo "<tr class='tablacarrito'>
        <td colspan='4'>
            <div class='botonesCarrito'>
    <li><a href='../../Contenido/Vistas/contenido.php'>Agregar más</a></li>

    <li>
        <form action='../../Ventas/Controlador/admin_tarjetas.php' method='POST' style='display:inline;'>
            <input type='hidden' name='idCarrito' value='" . $idCarrito . "'>
            <input type='hidden' name='total' value='" . $total . "'>
            <button type='submit'>
                Pagar
            </button>
        </form>
    </li>

    <li><a href='../Controlador/admin_carrito.php?action=vaciar'>Vaciar carrito</a></li>
</div>

        </td>
      </tr>";

echo '</table>';

}
        ?>
    </main>

    <footer class="responsivo">
        <p>© 2025 GamesTec. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
