<?php 
require_once(__DIR__ . '/../../../rutas.php'); 
require_once(CONTROLLER . 'ProductoController.php'); 
require_once(MODEL . 'Producto.php');

session_start();
if (isset($_SESSION['nombre_usuario'])) {
    $nombre_usuario = $_SESSION['nombre_usuario'];
} else {
    $nombre_usuario = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/seleccion.css">
</head>
<body>
    <?php include "../Generales/nav.php" ?>
    <div class="content contGrande">
        <!-- Formulario para Fútbol -->
        <form class="contTipo" action="listaProductos.php" method="POST">
            <div  onclick="this.closest('form').submit()">
                <input type="hidden" name="deporte" value="futbol">
                <img class="imgTipo" src="/NosaSports/Codigo/app/view/Img/futbol.jpeg" alt="">
                <h2>Fútbol</h2>
            </div>
        </form>

        <!-- Formulario para Tenis -->
        <form class="contTipo" action="listaProductos.php" method="POST">
            <div  onclick="this.closest('form').submit()">
                <input type="hidden" name="deporte" value="tenis">
                <img class="imgTipo" src="/NosaSports/Codigo/app/view/Img/tenis.jpg" alt="">
                <h2>Tenis</h2>
            </div>
        </form>

        <!-- Formulario para Baloncesto -->
        <form class="contTipo" action="listaProductos.php" method="POST">
            <div  onclick="this.closest('form').submit()">
                <input type="hidden" name="deporte" value="baloncesto">
                <img class="imgTipo" src="/NosaSports/Codigo/app/view/Img/baloncesto.webp" alt="">
                <h2>Baloncesto</h2>
            </div>
        </form>

        <!-- Formulario para Boxeo -->
        <form class="contTipo" action="listaProductos.php" method="POST">
            <div  onclick="this.closest('form').submit()">
                <input type="hidden" name="deporte" value="boxeo">
                <img class="imgTipo" src="/NosaSports/Codigo/app/view/Img/boxeo.jpg" alt="">
                <h2>Boxeo</h2>
            </div>
        </form>

    </div>

    <a href="inicio.php">
     <?php  include "botonAtras.php" ?>   
    </a>
    

    <?php  include "../Generales/footer.php" ?>


    
</body>
</html>