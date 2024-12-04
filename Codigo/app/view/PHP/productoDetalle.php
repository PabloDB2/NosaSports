<?php
require_once(__DIR__ . '/../../../rutas.php');
require_once(CONTROLLER . 'ProductoController.php');
require_once(CONTROLLER . 'PedidoController.php');
require_once(MODEL . 'Producto.php');

$productController = new ProductoController();
$pedidoController = new PedidoController(); // Incluir PedidoController
session_start();

if (isset($_SESSION['nombre_usuario'])) {
    $nombre_usuario = $_SESSION['nombre_usuario'];
} else {
    $nombre_usuario = null;
}

if (!isset($_POST['id'])) {
    echo "Producto no encontrado.";
    exit;
}

if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}

$id_producto = $_POST['id'];

$producto = $productController->getProductsById($id_producto);

if (!$producto) {
    echo "Producto no encontrado.";
    exit;
}

// Añadir a wishlist
if (isset($_POST['accion']) && $_POST['accion'] === 'añadirAWishlist') {
    if (!in_array($id_producto, $_SESSION['wishlist'], true)) {
        $_SESSION['wishlist'][] = $id_producto;
        $mensaje = "¡Producto añadido a tu wishlist!";
    } else {
        $mensaje = "Este producto ya está en tu wishlist.";
    }
}

// Dar like
if (isset($_POST['accion']) && $_POST['accion'] === 'darLike') {
    if (!isset($_SESSION['likes'][$id_producto])) {
        $_SESSION['likes'][$id_producto] = true;
        $producto['likes'] += 1;
    } else {
        unset($_SESSION['likes'][$id_producto]);
        $producto['likes'] -= 1;
    }

    // Actualiza los datos del producto
    $productController->modificarProducto($producto['id_producto'], $producto['nombre_producto'], $producto['precio'], $producto['descripcion'], $producto['deporte'], $producto['likes'], $producto['imagen']);
}

// Verificar si el usuario está logueado antes de permitir la compra
if (isset($_POST['accion']) && $_POST['accion'] === 'comprar') {
    if ($nombre_usuario) {
        // Crear un pedido
        $pedidoController->crearPedido($id_producto, $nombre_usuario);
        $mensajeCompra = "Pedido realizado con éxito";
    } else {
        $mensajeCompra = "Debes iniciar sesión para realizar la compra.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <link rel="stylesheet" href="../CSS/productoDetalle.css">
</head>

<body>
    <?php include "../Generales/nav.php" ?>

    <div class="main-container">
        <div class="detalleProducto">
            <div class="imagenProducto">
                <img src="<?= htmlspecialchars($producto['imagen']) ?>" alt="Imagen del producto">
                <div class="likeContainer">
                    <form action="" method="POST" class="formLike">
                        <input type="hidden" name="accion" value="darLike">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($producto['id_producto']) ?>">
                        <button type="submit" class="botonLike <?= isset($_SESSION['likes'][$producto['id_producto']]) ? 'dadoLike' : '' ?>">
                            &#x2764; <?= htmlspecialchars($producto['likes']) ?>
                        </button>
                    </form>
                </div>
            </div>
            <div class="infoProducto">
                <h1><?= htmlspecialchars($producto['nombre_producto']) ?></h1>
                <span class="categoria"><?= htmlspecialchars($producto['deporte']) ?></span>
                <p class="precio"><?= htmlspecialchars($producto['precio']) ?>€</p>
                <p class="descripcion"><?= htmlspecialchars($producto['descripcion']) ?></p>

                <?php if (isset($mensaje)) { ?>
                    <p class="mensajeAñadido"><?= $mensaje ?></p>
                <?php } ?>

                <?php if (isset($mensajeCompra)) { ?>
                    <p class="mensajeCompra"><?= $mensajeCompra ?></p>
                <?php } ?>

                <div class="acciones">
                    <form id="form-comprar" action="" method="POST" style="display:none;">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($producto['id_producto']) ?>">
                        <input type="hidden" name="accion" value="comprar">
                    </form>
                    <button type="button" class="botonComprar" onclick="confirmarCompra(event)">Comprar</button>

                    <div class="accionesBotones">
                        <form action="" method="POST">
                            <input type="hidden" name="accion" value="añadirAWishlist">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($producto['id_producto']) ?>">
                            <button type="submit" class="botonDeseados">Añadir a la wishlist</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="popup-confirmacion" class="popup">
        <div class="popup-contenido">
            <h2>¿Deseas comprar este producto?</h2>
            <div class="popup-botones">
                <button onclick="cancelarCompra()">Cancelar</button>
                <button onclick="confirmarYComprar()">Confirmar</button>
            </div>
        </div>
    </div>

    <?php include "../Generales/footer.php" ?>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('popup-confirmacion').style.display = 'none';
        }); // necesario para que no salga visible por defecto

        function confirmarCompra(event) {
            event.preventDefault();

            document.getElementById('popup-confirmacion').style.display = 'flex'; // lo muestra
        }

        function cancelarCompra() {
            document.getElementById('popup-confirmacion').style.display = 'none'; // lo oculta
        }

        function confirmarYComprar() {
            document.getElementById('form-comprar').submit(); // envia formualario
        }
    </script>
</body>

</html>