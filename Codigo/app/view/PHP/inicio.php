<?php
require_once(__DIR__ . '/../../../rutas.php'); 
require_once(CONTROLLER . 'ProductoController.php'); 
require_once(MODEL . 'Producto.php');
$productController = new ProductoController();
$productos = $productController->getAllProducts();
session_start();

if (isset($_SESSION['nombre_usuario'])) {
    $nombre_usuario = $_SESSION['nombre_usuario'];
} else {
    $nombre_usuario = null;
}

if (isset($_POST['cerrar_sesion'])) {
    session_destroy();
    header("Location: inicio.php");
    exit();
}
$mejoresProductos = $productController->productosConMasLikes();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/inicio.css">
</head>

<body>

    <div style="position: absolute; top: 10px; right: 10px;">
        <?php 
        if ($nombre_usuario) { 
            echo '<a href="cuenta.php" style="color: rgb(104,86,52);">' . htmlspecialchars($nombre_usuario) . '</a>';
        ?>
            <form action="inicio.php" method="POST">
                <button type="submit" name="cerrar_sesion">Cerrar sesión</button>
            </form>
        <?php 
        } else { 
        ?>
            <form action="login.php" method="get">
                <button type="submit">Iniciar sesión</button>
            </form>
        <?php 
        } 
        if ($nombre_usuario == "admin") { 
        ?>
        <form action="opcionesAdmin.php" method="get">
                <button type="submit">Opciones de admin</button>
            </form>
        <?php 
        } 
        ?>
    </div>

    <div class="content">
        <?php include "../Generales/nav.html" ?>
        <img class="imgFondo1" src="/NosaSports/Codigo/app/view/Img/bolas2.avif" alt="">

        <div class="texto1">
            <h1>NOSA SPORTS</h1>
            <h2>Tu pasión, nuestra misión: Lo mejor en accesorios deportivos</h2>
        </div>

        <div class="contMateriales">
            <div id="imagenTejidos">
                <img id="tejidos" src="/NosaSports/Codigo/app/view/Img/tejidos.png" alt="">
            </div>
            <div class="textoTejidos">
                <P>Siempre miramos de cuidaros, sabemos que la calidad marca la diferencia cuando se trata de rendimiento y confort. Por eso, todos nuestros tejidos son de alta calidad, diseñados para ofrecerte máxima durabilidad, transpirabilidad y comodidad. Ya sea que estés entrenando en el gimnasio, compitiendo en la pista o explorando la naturaleza, nuestras prendas te acompañan con tecnología avanzada y materiales que cuidan de tu piel, se adaptan a tu cuerpo y te ayudan a alcanzar tu mejor versión.
                    ¡Ven y siente la calidad que respalda cada uno de tus movimientos!</P>
            </div>

        </div>

        <div class="contMateriales">
            <div class="textoTejidos">
                <P>En NosaSports, nos comprometemos con el medio ambiente. La mayoría de nuestros productos deportivos están fabricados con materiales reciclados, combinando calidad y sostenibilidad. ¡Haz tu parte por el planeta mientras disfrutas de tus deportes favoritos!</P>
            </div>
            <div id="imagenTejidos">
                <img id="tejidos" src="/NosaSports/Codigo/app/view/Img/reciclado.jpg" alt="">
            </div>

        </div>

        <!-- productos mas populares -->

        <h2 style="text-align: center">Productos más populares</h2>
        <div class="topProductos">
           
                <?php foreach ($mejoresProductos as $producto) { ?>
                    <div class="tarjetaProducto">
                        <h3><?= htmlspecialchars($producto['nombre_producto']). "<br>" . htmlspecialchars($producto['likes']). " &#x2764;"  ?></h3>
                        <p><?= htmlspecialchars($producto['descripcion']) ?></p>
                        <p>Precio: <?= htmlspecialchars($producto['precio']) ?>€</p>

                    </div>
                <?php } ?>
            <
        </div>
    </div>

    <?php include "../Generales/footer.php" ?>

</body>

</html>
