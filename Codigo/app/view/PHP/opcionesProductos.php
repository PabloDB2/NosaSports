<?php
require_once(__DIR__ . '/../../../rutas.php'); 
require_once(CONTROLLER . 'ProductoController.php'); 
require_once(MODEL . 'Producto.php');

session_start();
?>

<br>
<h3>Crear producto</h3>

<form action="opcionesProductos.php" method="POST">
    <input type="hidden" name="formCreate" value="crearProducto">

    Nombre: <input type="text" name="nombre_producto" required><br>
    Precio: <input type="text" name="precio" required><br>
    Descripción: <textarea name="descripcion" required></textarea><br>
    Deporte: 
    <select id="deporte" name="deporte">
        <option value="fútbol">Fútbol</option>
        <option value="tenis">Tenis</option>
        <option value="baloncesto">Baloncesto</option>
        <option value="boxeo">Boxeo</option>
    </select><br>
    Likes: <input type="number" name="likes"><br>
    <input type="submit" value="Crear Producto">
</form>

<br>
<h3>Actualizar producto</h3>
<form action="opcionesProductos.php" method="POST">
    <input type="hidden" name="formUpdate" value="updateProducto">

    ID: <input type="number" name="id_producto" required><br>
    Nombre: <input type="text" name="nombre_producto"><br>
    Precio: <input type="text" name="precio"><br>
    Descripción: <textarea name="descripcion"></textarea><br>
    Deporte: <input type="text" name="deporte"><br>
    Likes: <input type="number" name="likes"><br>
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
    if (isset($_POST["nombre_producto"]) && isset($_POST["precio"]) && isset($_POST["descripcion"]) && isset($_POST["deporte"]) && isset($_POST["likes"])) {
        $productController->crearProducto($_POST["nombre_producto"], $_POST["precio"], $_POST["descripcion"], $_POST["deporte"], $_POST["likes"]);
        echo "<p>Se ha creado el producto " . htmlspecialchars($_POST["nombre_producto"]) . ".</p>";
    } else {
        echo "<p>No has introducido un producto válido.</p>";
    }
    exit();
}

// Actualizar producto
if (isset($_POST['formUpdate']) && $_POST['formUpdate'] == 'updateProducto') {
    if (isset($_POST["id_producto"]) && (isset($_POST["nombre_producto"]) || isset($_POST["precio"]) || isset($_POST["descripcion"]) || isset($_POST["deporte"]) || isset($_POST["likes"]))) {
        $productController->modificarProducto($_POST["id_producto"], $_POST["nombre_producto"], $_POST["precio"], $_POST["descripcion"], $_POST["deporte"], $_POST["likes"]);
        echo "<p>Se ha actualizado el producto con ID " . htmlspecialchars($_POST["id_producto"]) . ".</p>";
    } else {
        echo "<p>No has introducido datos válidos para la actualización.</p>";
    }
    exit();
}

// Eliminar producto
if (isset($_POST['formDelete']) && $_POST['formDelete'] == 'eliminarProducto') {
    if (isset($_POST["id_producto"])) {
        $productController->eliminarProducto($_POST["id_producto"]);
        echo "<p>Se ha eliminado el producto con ID " . htmlspecialchars($_POST["id_producto"]) . ".</p>";
    } else {
        echo "<p>No has introducido un ID válido.</p>";
    }
    exit();
}
?>
