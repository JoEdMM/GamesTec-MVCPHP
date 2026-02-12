<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>GamesTec</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="img/GamesTecLogo.png" alt="GamesTec Logo">
            <h1>GamesTec</h1>
        </div>
        <?php
if (isset($_GET['exito']) && $_GET['exito'] == 'logout') {
    echo "<p style='color: green;'>Sesión cerrada correctamente.</p>";
}
?>
        <nav>
            <a href="Acceso/Vistas/login.php">Iniciar sesión</a>
            <a href="Acceso/Vistas/register.php">Registrarse</a>
        </nav>
    </header>

    <main>
        <div class="carousel">
            <div class="slides">
                <img src="img/cp.jpeg" alt="Slide 1">
                <img src="img/f24.jpg" alt="Slide 2">
                <img src="img/fz5.jpg" alt="Slide 3">
                <img src="img/gof.jpeg" alt="Slide 4">
                <img src="img/gow.jpeg" alt="Slide 5">
                <img src="img/gtaV.jpg" alt="Slide 6">
                <img src="img/HR.jpg" alt="Slide 7">
                <img src="img/MC.jpg" alt="Slide 8">
                <img src="img/ps22.jpeg" alt="Slide 9">
                <img src="img/re.jpeg" alt="Slide 10">
                <img src="img/rust.jpg" alt="Slide 11">
                <img src="img/w.jpg" alt="Slide 12">
                
            </div>
            <div class="overlay">
                <div class="centro-container">
                    <h2>Bienvenidos a GamesTec</h2>
                    <p>¡Disfruta de la gran experiencial del Gaiming totalmente gratis!</p>
                </div>
                
            </div>
        </div>
    </main>

    <footer>
        <div class="social">
            <a href="#">Facebook</a> |
            <a href="#">Instagram</a> |
            <a href="#">Twitter</a>
        </div>
        <br><p>© 2025 GamesTec. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
