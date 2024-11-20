<?php
require_once(__DIR__ . '/../../../rutas.php'); 
require_once(CONTROLLER . 'WishlistController.php'); 
require_once(CONTROLLER . 'ProductoController.php'); 
require_once(MODEL . 'Wishlist.php'); 
require_once(MODEL . 'Producto.php'); 

session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['nombre_usuario'])) {
    echo "No has iniciado sesión.";
    exit;
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
    <title>Mi Wishlist</title>
    <link rel="stylesheet" href="../CSS/wishlist.css">
</head>
<body>
    <div class="content">
        <?php include "../Generales/nav.php"; ?>
        <h1>Mi Wishlist</h1>

        <?php if (!empty($wishlistItems)) { ?>
            <div class="topProductos">
                <?php foreach ($wishlistItems as $item) { 
                    // Obtener detalles del producto a partir de su ID
                    $producto = $productController->getProductsById($item['id_producto']);
                ?>
                    <div class="tarjetaProducto">
                        <img class="imgProductos" src="<?= htmlspecialchars($producto['imagen']) ?>" alt="">
                        <h3>
                            <?= htmlspecialchars($producto['nombre_producto']) ?><br>
                            <?= htmlspecialchars($producto['likes']) ?> &#x2764;
                        </h3>
                        <p><?= htmlspecialchars($producto['descripcion']) ?></p>
                        <p>Precio: <?= htmlspecialchars($producto['precio']) ?>€</p>
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
