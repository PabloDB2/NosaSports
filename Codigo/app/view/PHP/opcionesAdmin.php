<?php
require_once(__DIR__ . '/../../../rutas.php');
require_once(CONTROLLER . 'ProductoController.php');
require_once(MODEL . 'Producto.php');

session_start();
if (isset($_SESSION['nombre_usuario'])) {
    $nombre_usuario = $_SESSION['nombre_usuario'];
} else {
    $nombre_usuario = null;
}

// solo se puede acceder a las opciones de admin si el usuario logeado es admin
// nombre_usuario: admin
// contraseña: admin

if (!isset($_SESSION['nombre_usuario']) || $_SESSION['nombre_usuario'] !== 'admin') {
    echo "<h3>Acceso denegado</h3>";
    echo "<p>No tienes permisos de admin.</p>";
    echo "<p><a href='inicio.php'><button>Volver a inicio</button></a></p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/opcionesAdmin.css">
</head>

<body>
    <?php include "../Generales/nav.php"; 
    
    // Obtenemos los productos desde el controlador
    $productController = new ProductoController();
    $productos = $productController->getAllProducts();
    
    ?>
    <h1>Opciones Admin</h1>

    <!--Formato de la ruta desde /NosaSports/Codigo/app/view/Img/imagenEjemplo.jpg -->

    <div>
        <form action="opcionesAdmin.php" method="POST">
            <h3>Crear producto</h3>
            <input type="hidden" name="formCreate" value="crearProducto">

            <b>Nombre:</b><br>
            <input type="text" name="nombre_producto" required><br>

            <b>Precio:</b><br>
            <input type="number" step="0.01" name="precio" required><br>

            <b>Descripcion:</b><br>
            <textarea name="descripcion" required></textarea><br>

            <b>Deporte:</b><br>
            <select id="deporte" name="deporte" required>
                <option value="fútbol">Fútbol</option>
                <option value="tenis">Tenis</option>
                <option value="baloncesto">Baloncesto</option>
                <option value="boxeo">Boxeo</option>
            </select><br>
            <b>Likes:</b><br>
            <input type="number" name="likes" required><br>

            <b>Imagen:</b><br>
            <input type="text" name="imagen" required><br>
            <input type="submit" value="Crear Producto" style="background-color: rgb(104,86,52); color: white">
        </form>

        <br>

        

        <form action="opcionesAdmin.php" method="POST">
            <h3>Actualizar producto</h3>
            <input type="hidden" name="formUpdate" value="updateProducto">
            <label for="productoSelector"><b>Selecciona un producto:</b></label><br>
    <select name="id_producto" id="productoSelector" required>
        <option value="">--Selecciona un producto--</option>
        <?php
        // Verificamos si hay productos disponibles
        if (!empty($productos) && is_array($productos)) {
        //Uso un for para que se vean todas las opciones  sobre los productos.
            for ($i = 0; $i < count($productos); $i++) {
                echo '<option value="' . $productos[$i]['id_producto'] . '">' . $productos[$i]['id_producto'] . ' - ' . $productos[$i]['nombre_producto'] . '</option>';
            }
        } else {
            echo '<option value="">No hay productos disponibles</option>';
        }
    ?>
    </select><br><br>

            <!-- <b>ID:</b><br> <input type="number" name="id_producto" required><br> -->
            <b>Nombre:</b><br> <input type="text" name="nombre_producto" ><br>
            <b>Precio:</b><br> <input type="number" step="0.01" name="precio" ><br> <!-- step=0.01 solo admite números máximo 2 decimales-->
            <b>Descripcion:</b><br> <textarea name="descripcion"></textarea><br>
            <b>Deporte:</b><br> <input type="text" name="deporte"><br>
            <b>Likes:</b><br> <input type="number" name="likes"><br>
            <b>Imagen:</b><br><input type="text" name="imagen"><br>
            <input type="submit" value="Actualizar producto" style="background-color: rgb(104,86,52); color: white">
        </form>

        <br>

        <form action="opcionesAdmin.php" method="POST">
            <h3>Eliminar producto</h3>
            <input type="hidden" name="formDelete" value="eliminarProducto">
            <b>ID:</b><br>
            <select name="id_producto" id="productoSelector" required>
        <option value="">--Selecciona un producto--</option>
        <?php
        // Verificamos si hay productos disponibles
        if (!empty($productos) && is_array($productos)) {
        //Uso un for para que se vean todas las opciones  sobre los productos.
            for ($i = 0; $i < count($productos); $i++) {
                echo '<option value="' . $productos[$i]['id_producto'] . '">' . $productos[$i]['id_producto'] . ' - ' . $productos[$i]['nombre_producto'] . '</option>';
            }
        } else {
            echo '<option value="">No hay productos disponibles</option>';
        }
    ?>
    </select><br><br>
            <input type="submit" value="Eliminar producto" style="background-color: red;  color: white">
        </form>
    </div>

    <?php  include "../Generales/footer.php" ?>
</body>

</html>

<?php

$productController = new ProductoController();
$productos = $productController->getAllProducts();

// Crear producto
if (isset($_POST['formCreate']) && $_POST['formCreate'] == 'crearProducto') {
    if (!empty($_POST["nombre_producto"]) && !empty($_POST["descripcion"]) && !empty($_POST["deporte"]) && is_numeric($_POST["likes"])) {
        $nombreProducto = htmlspecialchars($_POST["nombre_producto"]);
        $descripcion = htmlspecialchars($_POST["descripcion"]);
        $deporte = htmlspecialchars($_POST["deporte"]);
        $likes = htmlspecialchars($_POST["likes"]);
        $precio = htmlspecialchars($_POST["precio"]);
        $imagen = htmlspecialchars($_POST["imagen"]);

        // validar precio
        if (filter_var($precio, FILTER_VALIDATE_FLOAT)) {
            $productController->crearProducto($nombreProducto, $precio, $descripcion, $deporte, $likes, $imagen);
            echo "<p>Se ha creado el producto " . $nombreProducto . ".</p>";
        } else {
            echo "<p>Precio no válido.</p>";
        }
    } else {
        echo "<p>No has introducido un producto válido.</p>";
    }
    exit();


    
}

if (isset($_POST['formUpdate']) && $_POST['formUpdate'] == 'updateProducto') {
   //Defino todas la varibales
    $id_producto = $_POST["id_producto"];
   
    // Validar si el ID del producto es válido
    if (!empty($id_producto) && is_numeric($id_producto)) {
        // Obtener el producto actual para asegurarse de que existe
        $producto = $productController->getProductsById($id_producto);
        
         // Solo actualizar el nombre del producto si el campo no está vacío
            if (!empty($_POST["nombre_producto"])) {
                $nombreProducto = htmlspecialchars($_POST["nombre_producto"]);
                // Validar que el nombre no sea NULL o vacío antes de intentar actualizar
                    $productController->modificarNombreProducto($id_producto, $nombreProducto);
            } 

            if (!empty($_POST["precio"])) {
                $precio = htmlspecialchars($_POST["precio"]);               
                    $productController->modificarPrecio($id_producto, $precio);      
            } 
            if (!empty($_POST["likes"])) {
                $likes = htmlspecialchars($_POST["likes"]);               
                    $productController->modificarLikes($id_producto, $likes);      
            } 

            if (!empty($_POST["deporte"])) {
                $deporte = htmlspecialchars($_POST["deporte"]);               
                    $productController->modificarDeporte($id_producto, $deporte);      
            }
            if (!empty($_POST["descripcion"])) {
                $descripcion = htmlspecialchars($_POST["descripcion"]);               
                    $productController->modificarDescripcion($id_producto, $descripcion);      
            }

            if (!empty($_POST["imagen"])) {
                $imagen = htmlspecialchars($_POST["imagen"]);               
                    $productController->modificarImagen($id_producto, $imagen);      
            }

          
    } else {
        echo "<p>ID de producto no válido.</p>";
    }
    exit();
}


// Eliminar producto
if (isset($_POST['formDelete']) && $_POST['formDelete'] == 'eliminarProducto') {
    if (!empty($_POST["id_producto"]) && is_numeric($_POST["id_producto"])) {
        $idProducto = htmlspecialchars($_POST["id_producto"]);

        $productController->eliminarProducto($idProducto);
        echo "<p>Se ha eliminado el producto con ID " . $idProducto . ".</p>";
    } else {
        echo "<p>No has introducido un ID válido.</p>";
    }
    exit();
}
?>
