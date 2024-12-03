<?php
require_once(__DIR__ . '/../../../rutas.php');
require_once(CONTROLLER . 'WishlistController.php');
require_once(CONTROLLER . 'ProductoController.php');
require_once(MODEL . 'Producto.php');
require_once(MODEL . 'Wishlist.php');

session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['nombre_usuario'])) {
    echo "<h3>No has iniciado sesión.</h3>";
    echo '<form action="login.php" method="get">
            <button type="submit">Iniciar sesión</button>
          </form>';
    exit();
}

$nombre_usuario = $_SESSION['nombre_usuario'];

if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}

$productController = new ProductoController();
$wishlistController = new WishlistController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Añadir a la wishlist en la sesión
    if (isset($_POST['accion']) && $_POST['accion'] == 'añadirAWishlist') {
        $id_producto = (int) $_POST['id_producto']; // Aseguramos que el id sea un número entero

        // Para evitar duplicados en la sesión
        if (!in_array($id_producto, $_SESSION['wishlist'], true)) {
            $_SESSION['wishlist'][] = $id_producto;
        }
    }

    // Eliminar de la sesión y base de datos
    if (isset($_POST['accion']) && $_POST['accion'] == 'eliminarDeWishlist') {
        $id_producto = (int) $_POST['id_producto']; // Aseguramos que el id sea un número entero

        // Eliminar de la sesión
        if (($key = array_search($id_producto, $_SESSION['wishlist'], true)) !== false) {
            unset($_SESSION['wishlist'][$key]);
            $_SESSION['wishlist'] = array_values($_SESSION['wishlist']);
        }

        // Eliminar de la base de datos
        $wishlistController->removeProductFromWishlist($nombre_usuario, $id_producto);
    }

    // Guardar wishlist en la base de datos
    if (isset($_POST['accion']) && $_POST['accion'] == 'guardarEnBaseDeDatos') {
        foreach ($_SESSION['wishlist'] as $id_producto) {
            $wishlistController->addProductToWishlist($nombre_usuario, $id_producto);
        }
    }

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

// Obtener los productos en la wishlist
$productos_wishlist = [];
foreach ($_SESSION['wishlist'] as $id) {
    $producto = $productController->getProductsById($id);
    if ($producto) {
        $productos_wishlist[] = $producto;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <link rel="stylesheet" href="../CSS/paginaWishlist.css">
</head>
<body>
    <div class="content">
        <?php include "../Generales/nav.php"; ?>
        <h1>Mi wishlist</h1>

        <?php if (!empty($productos_wishlist)) { ?>
            <div class="topProductos">
                <?php foreach ($productos_wishlist as $producto) { ?>
                    <div class="tarjetaProducto">
                        <img class="imgProductos" src="<?= htmlspecialchars($producto['imagen']) ?>" alt="Imagen de <?= htmlspecialchars($producto['nombre_producto']) ?>">

                        <div class="productoInfo">
                            <h3>
                                <?= htmlspecialchars($producto['nombre_producto']) ?><br>
                                <?= htmlspecialchars($producto['likes']) ?> &#x2764;
                            </h3>
                            <p><?= htmlspecialchars($producto['precio']) ?>€</p>
                        </div>

                        <div class="accionesProducto">
                            <!-- Eliminar de la wishlist -->
                            <form action="paginaWishlist.php" method="POST">
                                <input type="hidden" name="id_producto" value="<?= htmlspecialchars($producto['id_producto']) ?>">
                                <input type="hidden" name="accion" value="eliminarDeWishlist">
                                <button type="submit" class="btnEliminar">Eliminar</button>
                            </form>

                            <!-- Guardar en la base de datos -->
                            <form action="paginaWishlist.php" method="POST">
                                <input type="hidden" name="accion" value="guardarEnBaseDeDatos">
                                <button type="submit" class="btnGuardar">Guardar en base de datos</button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>

        <?php } else { ?>
            <h1>No tienes productos en tu wishlist.</h1>
        <?php } ?>

    </div>

    <?php include "../Generales/footer.php"; ?>
</body>
</html>
