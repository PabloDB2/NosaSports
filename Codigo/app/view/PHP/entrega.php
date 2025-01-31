<?php
require_once(__DIR__ . '/../../../rutas.php');
require_once(CONTROLLER . 'ProductoController.php');
require_once(MODEL . 'Producto.php');
$productController = new ProductoController();

session_start();

// Si el usuario está logueado
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
    <link rel="stylesheet" href="../CSS/entrega.css">
</head>
<body>
    <?php 

    session_start();
    
    include "../Generales/nav.php";

    $productController = new ProductoController();

    //saco el producto de la sesion y lo muestro
    $id_producto = $_SESSION['entrega'];
    $producto = $productController->getProductsById($id_producto);

    $nombreProducto = $producto['nombre_producto'];
    $imagen = $producto['imagen'];
    

    $fechaEntrega = date('l, d F Y', strtotime('+3 days'));
    ?>



    <div class="div1">
        <img class="imgEnviado" src="../Img/enviado.jpg" alt="Enviado">
        <h2>Hola <?php echo $nombre_usuario ?>, tu producto <?php echo $nombreProducto ?>  está en camino:</h2>
        <h3>Fecha estimada de entrega:</h3>
        <h3><?php echo $fechaEntrega ?></h3>
        
    
                    <a href="pedidos.php">
                        <div class="divProduc" onclick="this.closest('form').submit()">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($producto['id_producto']) ?>">
                            <img class="imgProducto" src="<?= htmlspecialchars($producto['imagen']) ?>" alt="">
                            <h3 id="nombre"><?= htmlspecialchars($producto['nombre_producto']) ?></h3>
                            
                        </div>

                    </a>
                        
    </div>
    
    <a href="seleccion.php">
        <?php include "botonAtras.php" ?>
    </a>

   

    
</body>

</html>