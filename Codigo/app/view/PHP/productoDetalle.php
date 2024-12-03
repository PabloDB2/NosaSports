<?php
require_once(__DIR__ . '/../../../rutas.php');
require_once(CONTROLLER . 'ProductoController.php');
require_once(MODEL . 'Producto.php');

$productController = new ProductoController();
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

// dar like
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

                <!-- Mensaje de añadir a wishlist -->
                <?php if (isset($mensaje)) { ?>
                    <p class="mensajeAñadido"><?= $mensaje ?></p>
                <?php }
                ?>

                <div class="acciones">
                    <!-- Formulario de compra -->
                    <form action="compra.php" method="POST">
                        <input type="hidden" name="id_producto" value="<?= htmlspecialchars($producto['id_producto']) ?>">
                        <button type="submit" class="botonComprar">Comprar</button>
                    </form>

                    <div class="accionesBotones">
                        <!-- Formulario para añadir a wishlist -->
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

    <?php include "../Generales/footer.php" ?>

</body>

</html>