<?php
require_once(__DIR__ . '/../../../rutas.php'); 
require_once(CONTROLLER . 'ProductoController.php'); 
require_once(MODEL . 'Producto.php');
$productController = new ProductoController();
$productos = $productController->getAllProducts();

session_start();





//Comprobamos si hay deporte seleccionado 
if( isset($_POST['deporte'])){
   $deporte = $_POST['deporte']; 

   //En caso de que no haya nos lleva otra vez a la selección
}else{
    $deporte = null;
    echo "no lo pilla ";
   
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
   
   <div class="topProductos">
           
                <?php foreach ($productosPorDeporte as $producto) { ?>
                    <div >
                       <img class="imgProducto" src="<?=htmlspecialchars($producto['imagen'])?>" alt="">
                        <h3><?= htmlspecialchars($producto['nombre_producto']). "<br>" . htmlspecialchars($producto['likes']). " &#x2764;"  ?></h3>
                        <p><?= htmlspecialchars($producto['descripcion']) ?></p>
                        <p>Precio: <?= htmlspecialchars($producto['precio']) ?>€</p>
                        

                    </div>
                <?php } ?>
            
    </div>
   
    
</body>
</html>