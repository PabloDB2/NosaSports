<?php
require_once(__DIR__ . '/../../rutas.php'); 
require_once(CONFIG . 'dbConnection.php'); // ruta de config definido en rutas.php

class ProductoController {
    public function getAllProducts() {
        return Producto::getAllProducts();
    }

    public function getProductsByName($nombre_producto) {
        return Producto::getProductByName($nombre_producto);
    }

    public function crearProducto($nombre_producto, $precio, $descripcion, $deporte, $likes, $imagen) {
        $nuevoProducto = new Producto();
        $nuevoProducto->setNombre($nombre_producto);
        $nuevoProducto->setPrecio($precio); 
        $nuevoProducto->setDescripcion($descripcion);
        $nuevoProducto->setDeporte($deporte);
        $nuevoProducto->setLikes($likes);
        $nuevoProducto->setImagen($imagen); // Establecer el valor de la imagen

        $nuevoProducto->create();
    }

    public function modificarProducto($id_producto, $nombre_producto, $precio, $descripcion, $deporte, $likes, $imagen) {
        $producto = new Producto();
        $producto->setIdProducto($id_producto);
        $producto->setNombre($nombre_producto);
        $producto->setPrecio($precio);
        $producto->setDescripcion($descripcion);
        $producto->setDeporte($deporte);
        $producto->setLikes($likes);
        $producto->setImagen($imagen); // Establecer el valor de la imagen

        $producto->updateProduct(); 
    }

    public function eliminarProducto($id_producto) {
        $producto = new Producto();
        $producto->setIdProducto($id_producto);
        $producto->deleteProduct();
    }

    public function productosConMasLikes() {
        return Producto::getTopLikedProducts();
    }

    public function getProductsBySport($deporte) {
        return Producto::getProductBySport($deporte);
    }
}
?>
