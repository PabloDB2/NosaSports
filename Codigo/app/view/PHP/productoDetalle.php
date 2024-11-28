<?php
require_once(__DIR__ . '/../../../rutas.php');
require_once(CONTROLLER . 'ProductoController.php');
require_once(MODEL . 'Producto.php');

$productController = new ProductoController();
session_start();

// Obtener el nombre del usuario desde la sesión
$nombre_usuario = $_SESSION['nombre_usuario'] ?? null;

// Verificar que se ha recibido un ID de producto válido
if (!isset($_POST['id']) || !filter_var($_POST['id'], FILTER_VALIDATE_INT)) {
    echo "Producto no encontrado.";
    exit;
}

$id_producto = $_POST['id'];

// Obtener el producto por su ID
$producto = $productController->getProductsById($id_producto);

// Verificar si el producto existe
if (!$producto) {
    echo "Producto no encontrado.";
    exit;
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

    <!-- Contenedor principal centrado -->
    <div class="main-container">
        <div class="detalleProducto">
            <div class="imagenProducto">
                <img src="<?= htmlspecialchars($producto['imagen']) ?>" alt="Imagen del producto">
            </div>
            <div class="infoProducto">
                <h1><?= htmlspecialchars($producto['nombre_producto']) ?></h1>
                <span class="categoria"><?= htmlspecialchars($producto['deporte']) ?></span>
                <p class="precio"><?= htmlspecialchars($producto['precio']) ?>€</p>
                <p class="descripcion"><?= htmlspecialchars($producto['descripcion']) ?></p>

                <div class="acciones">
                    <!-- Formulario de compra -->
                    <form action="compra.php" method="POST">
                        <input type="hidden" name="id_producto" value="<?= htmlspecialchars($producto['id_producto']) ?>">
                        <button type="submit" class="botonComprar">Comprar</button>
                    </form>

                    <!-- Formulario para wishlist -->
                    <form action="productoDetalle.php" method="POST">
                        <input type="hidden" name="id_producto" value="<?= htmlspecialchars($producto['id_producto']) ?>">
                        <button type="submit" class="botonDeseados">Añadir a la wishlist</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <?php include "../Generales/footer.php" ?>

</body>

</html>
