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
<style>
    @keyframes fadeInUp {
        0% {
            transform: translateY(50px);
            opacity: 0;
        }

        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .contMateriales {
        animation: fadeInUp 1.5s ease-out;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 30px;
        transition: transform 0.8s ease, box-shadow 0.8s ease;
        background: #f9f9f9;
        border-radius: 10px;
        overflow: hidden;
        padding: 40px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-family: Arial, Helvetica, sans-serif;
        font-size: 20px;

    }

    .contMateriales:hover {
        transform: scale(1.02);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .textoTejidos {
        font-size: 1.2rem;
        line-height: 1.8;
        color: #333;
        padding: 20px;
        flex: 1;
    }

    #imagenTejidos img {
        width: 100%;
        max-width: 300px;
        height: auto;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.8s ease;
    }

    #imagenTejidos img:hover {
        transform: scale(1.05);
    }
    .divProduc:hover {
    cursor: pointer;

}
</style>


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
            <img class="imgFondo1" src="/NosaSports/Codigo/app/view/Img/bolas.avif" alt="">

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
            <div class="topProductos">

                <?php foreach ($mejoresProductos as $producto) { ?>

                    <form class="formProducto" action="productodetalle.php" method="GET">
                        <div class="divProduc" onclick="this.closest('form').submit()">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($producto['id_producto']) ?>">
                            <h3 id="likes"><?= htmlspecialchars($producto['likes']) . " &#x2764;"  ?></h3>
                            <img class="imgProducto" src="<?= htmlspecialchars($producto['imagen']) ?>" alt="">
                            <h3 id="nombre"><?= htmlspecialchars($producto['nombre_producto']) ?></h3>
                            <p id="precio"> <?= htmlspecialchars($producto['precio']) ?>€</p>

                        </div>
                    </form>
                <?php } ?>

            </div>

            <?php include "../Generales/footer.php" ?>
        </div>

    </div>

</body>

</html>