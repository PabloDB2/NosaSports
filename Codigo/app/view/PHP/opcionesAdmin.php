<?php
require_once(__DIR__ . '/../../../rutas.php'); 
require_once(CONTROLLER . 'ProductoController.php'); 
require_once(MODEL . 'Producto.php');

session_start();

// solo se puede acceder a las opciones de admin si el usuario logeado es 123
    // nombre_usuario: 123
    // contraseña: 123
    
if (!isset($_SESSION['nombre_usuario']) || $_SESSION['nombre_usuario'] !== '123') {
    echo "<h3>Acceso denegado</h3>";
    echo "<p>No tienes permisos de admin.</p>";
    echo "<p><a href='inicio.php'><button>Volver a inicio</button></a></p>";
    exit();
}
?>
<h1>Opciones Admin</h1>

<h3>Crear producto</h3>

<form action="opcionesProductos.php" method="POST">
    <input type="hidden" name="formCreate" value="crearProducto">

    Nombre: <input type="text" name="nombre_producto" required><br>
    Precio: <input type="text" name="precio" required><br>
    Descripción: <textarea name="descripcion" required></textarea><br>
    Deporte: 
    <select id="deporte" name="deporte" required>
        <option value="fútbol">Fútbol</option>
        <option value="tenis">Tenis</option>
        <option value="baloncesto">Baloncesto</option>
        <option value="boxeo">Boxeo</option>
    </select><br>
    Likes: <input type="number" name="likes" required><br>
    <input type="submit" value="Crear Producto">
</form>

<br>
<h3>Actualizar producto</h3>
<form action="opcionesProductos.php" method="POST">
    <input type="hidden" name="formUpdate" value="updateProducto">

    ID: <input type="number" name="id_producto" required><br>
    Nombre: <input type="text" name="nombre_producto" required><br>
    Precio: <input type="text" name="precio" required><br>
    Descripción: <textarea name="descripcion" required></textarea><br>
    Deporte: <input type="text" name="deporte" required><br>
    Likes: <input type="number" name="likes" required><br>
    <input type="submit" value="Actualizar producto">
</form>

<br>
<h3>Eliminar producto</h3>
<form action="opcionesProductos.php" method="POST">
    <input type="hidden" name="formDelete" value="eliminarProducto">
    ID: <input type="number" name="id_producto" required><br>
    <input type="submit" value="Eliminar producto">
</form>

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

        // validar precio
        if (filter_var($precio, FILTER_VALIDATE_FLOAT)) {
            $productController->crearProducto($nombreProducto, $precio, $descripcion, $deporte, $likes);
            echo "<p>Se ha creado el producto " . $nombreProducto . ".</p>";
        } else {
            echo "<p>Precio no válido.</p>";
        }
    } else {
        echo "<p>No has introducido un producto válido.</p>";
    }
    exit();
}

// Actualizar producto
if (isset($_POST['formUpdate']) && $_POST['formUpdate'] == 'updateProducto') {
    if (isset($_POST["id_producto"]) && isset($_POST["nombre_producto"]) && isset($_POST["precio"]) && isset($_POST["descripcion"]) && isset($_POST["deporte"]) && isset($_POST["likes"])) {
        $idProducto = htmlspecialchars($_POST["id_producto"]);
        $nombreProducto = htmlspecialchars($_POST["nombre_producto"]);
        $precio = htmlspecialchars($_POST["precio"]);
        $descripcion = htmlspecialchars($_POST["descripcion"]);
        $deporte = htmlspecialchars($_POST["deporte"]);
        $likes = htmlspecialchars($_POST["likes"]);

        // validar precio
        if (filter_var($precio, FILTER_VALIDATE_FLOAT)) {
            $productController->modificarProducto($idProducto, $nombreProducto, $precio, $descripcion, $deporte, $likes);
            echo "<p>Se ha modificado el producto " . $nombreProducto . ".</p>";
        } else {
            echo "<p>Precio no válido.</p>";
        }
    } else {
        echo "<p>Los datos no son válidos.</p>";
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
