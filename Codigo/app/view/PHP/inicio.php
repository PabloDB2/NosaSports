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

$mejoresProductos = $productController->productosConMasLikes();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../CSS/inicio.css">
</head>



<body onload="setInterval('Blink()',600)">
    <script>
        function Blink() {
            var ElemsBlink = document.getElementsByTagName('blink');
            for (var i = 0; i < ElemsBlink.length; i++)
                ElemsBlink[i].style.visibility = ElemsBlink[i].style.visibility ==
                'visible' ? 'hidden' : 'visible';
        }
    </script>


    <div class="distribuidor">
        <div class="content">
            <?php include "../Generales/nav.php" ?>
            <img class="imgFondo1" src="/NosaSports/Codigo/app/view/Img/bolas.png" alt="">

            <div class="texto1">
                <h1>NOSA SPORTS</h1>
                <h2>Tu pasión, nuestra misión: Lo mejor en accesorios deportivos</h2>
            </div>

            <div class="contMateriales">
                <div id="imagenTejidos">
                    <img id="tejidos" src="/NosaSports/Codigo/app/view/Img/tejidos.png" alt="">
                </div>
                <div class="textoTejidos">
                    <P>Siempre miramos de cuidaros, sabemos que la calidad marca la diferencia cuando se trata de rendimiento y confort . Ya sea que estés entrenando en el gimnasio, compitiendo en la pista o explorando la naturaleza, nuestras prendas te acompañan con tecnología avanzada y materiales que cuidan de tu piel, se adaptan a tu cuerpo y te ayudan a alcanzar tu mejor versión.
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

            <h2 id="h2Populares">
                <blink>Productos más populares</blink>
            </h2>
            
            <div class="contProductos">
        <div class="productos">
            <?php
            if ($mejoresProductos) {
                foreach ($mejoresProductos as $producto) { ?>
                    <form class="formProducto" action="productodetalle.php" method="GET">
                        <div class="divProduc" onclick="this.closest('form').submit()">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($producto['id_producto']) ?>">
                            <img class="imgProducto" src="<?= htmlspecialchars($producto['imagen']) ?>" alt="">
                            <h3 id="likes"><?= htmlspecialchars($producto['likes']) . " &#x2764;" ?></h3>
                            <h3 id="nombre"><?= htmlspecialchars($producto['nombre_producto']) ?></h3>
                            <p id="precio"><?= htmlspecialchars($producto['precio']) ?>€</p>
                        </div>
                    </form>
                <?php }
            } else { ?>
                <p>No se han encontrado productos.</p>
            <?php } ?>
        </div>
    </div>

            <?php include "../Generales/footer.php" ?>
        </div>

    </div>

</body>

</html>