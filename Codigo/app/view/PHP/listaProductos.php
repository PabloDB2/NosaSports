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




//Comprobamos si hay deporte seleccionado 
if( isset($_POST['deporte'])){
   $deporte = $_POST['deporte']; 

   //En caso de que no haya nos lleva otra vez a la selección
}else{
    $deporte = null;
    echo "No se ha seleccionado un deporte válido.";
   
}
$productosPorDeporte = $productController->getProductsBySport($deporte);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/listaProductos.css">
</head>
<body>

<?php include "../Generales/nav.php" ?>

   <div class="contProductos">
   <div class="productos">
    <?php foreach ($productosPorDeporte as $producto) { ?>
        <form class="formProducto" action="productodetalle.php" method="POST">
            <div class="divProduc" onclick="this.closest('form').submit()">
                <input type="hidden" name="id" value="<?= htmlspecialchars($producto['id_producto']) ?>">
                <h3 id="likes"><?= htmlspecialchars($producto['likes']) . " &#x2764;" ?></h3>     
                <img class="imgProducto" src="<?= htmlspecialchars($producto['imagen']) ?>" alt="">    
                <h3 id="nombre"><?= htmlspecialchars($producto['nombre_producto']) ?></h3> 
                <p id="precio"><?= htmlspecialchars($producto['precio']) ?>€</p>
            </div>
        </form>
    <?php } ?>
</div>
   
    </div>
    <?php include "../Generales/footer.php" ?>

</body>
</html>