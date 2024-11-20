<?php
require_once(__DIR__ . '/../../../rutas.php'); 
require_once(CONTROLLER . 'WishlistController.php'); 
require_once(CONTROLLER . 'ProductoController.php'); 
require_once(MODEL . 'Wishlist.php'); 
require_once(MODEL . 'Producto.php'); 

session_start();

if (!isset($_SESSION['nombre_usuario'])) {
    echo "<h3>No has iniciado sesión.</h3>";
    echo '<form action="login.php" method="get">
            <button type="submit">Iniciar sesión</button>
          </form>';
    exit();
}

$nombre_usuario = $_SESSION['nombre_usuario'];

$wishlistController = new WishlistController();
$productController = new ProductoController();

// Obtener la wishlist del usuario logueado
$wishlistItems = $wishlistController->getWishlistByUser($nombre_usuario);
?>

<!DOCTYPE html>
<html lang="en">
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

        <?php if (!empty($wishlistItems)) { ?>
            <div class="topProductos">
                <?php foreach ($wishlistItems as $item) { 
                    $producto = $productController->getProductsById($item['id_producto']);
                ?>
                    <div class="tarjetaProducto">
                        <img class="imgProductos" src="<?= htmlspecialchars($producto['imagen']) ?>" alt="">

                        <div class="productoInfo">
                            <h3>
                                <?= htmlspecialchars($producto['nombre_producto']) ?><br>
                                <?= htmlspecialchars($producto['likes']) ?> &#x2764;
                            </h3>
                            <p><?= htmlspecialchars($producto['precio']) ?>€</p>
                        </div>

                        <div class="accionesProducto">
                            <button class="btnEliminar">Eliminar</button>
                            <button class="btnGuardar">Guardar</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <p>No tienes productos en tu wishlist.</p>
        <?php } ?>

    </div>

    <?php include "../Generales/footer.php"; ?>
</body>
</html>
