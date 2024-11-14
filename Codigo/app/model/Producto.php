<?php
require_once(__DIR__ . '/../../rutas.php');
require_once(CONFIG . 'dbConnection.php'); // ruta de config definido en rutas.php

class Producto
{
    private $nombre_producto;
    private $precio;
    private $id_producto;
    private $likes;
    private $deporte;
    private $descripcion;
    private $imagen; 

    // Getters
    public function getNombre()
    {
        return $this->nombre_producto;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getIdProducto()
    {
        return $this->id_producto;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getLikes()
    {
        return $this->likes;
    }

    public function getDeporte()
    {
        return $this->deporte;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    // Setters
    public function setNombre($nombre_producto)
    {
        $this->nombre_producto = $nombre_producto;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function setIdProducto($id_producto)
    {
        $this->id_producto = $id_producto;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setLikes($likes)
    {
        $this->likes = $likes;
    }

    public function setDeporte($deporte)
    {
        $this->deporte = $deporte;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    // Métodos 
    public static function getAllProducts()
    {
        try {
            $conn = getDBConnection();
            $query = $conn->query("SELECT * FROM producto");
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error al ejecutar la query: " . $e->getMessage();
        }
    }

    public static function getProductByName($nombre_producto)
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("SELECT * FROM producto WHERE nombre_producto = ?");
            $sentencia->bindParam(1, $nombre_producto);
            $sentencia->execute();
            $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error al obtener el producto: " . $e->getMessage();
        }
    }

    public function create()
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("INSERT INTO producto (nombre_producto, precio, descripcion, deporte, likes, imagen) VALUES (?,?,?,?,?,?)");
            $sentencia->bindParam(1, $this->nombre_producto);
            $sentencia->bindParam(2, $this->precio);
            $sentencia->bindParam(3, $this->descripcion);
            $sentencia->bindParam(4, $this->deporte);
            $sentencia->bindParam(5, $this->likes);
            $sentencia->bindParam(6, $this->imagen);
            $sentencia->execute();
        } catch (PDOException $e) {
            echo "Error en la conexión a base de datos: " . $e->getMessage();
        }
    }

    public function updateProduct()
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("UPDATE producto SET nombre_producto = ?, precio = ?, descripcion = ?, deporte = ?, likes = ?, imagen = ? WHERE id_producto = ?");
            $sentencia->bindParam(1, $this->nombre_producto);
            $sentencia->bindParam(2, $this->precio);
            $sentencia->bindParam(3, $this->descripcion);
            $sentencia->bindParam(4, $this->deporte);
            $sentencia->bindParam(5, $this->likes);
            $sentencia->bindParam(6, $this->imagen);
            $sentencia->bindParam(7, $this->id_producto);
            $sentencia->execute();
        } catch (PDOException $e) {
            echo "Error en la conexión a base de datos: " . $e->getMessage();
        }
    }

    public function deleteProduct()
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("DELETE FROM producto WHERE id_producto = ?");
            $sentencia->bindParam(1, $this->id_producto);
            $sentencia->execute();
        } catch (PDOException $e) {
            echo "Error en la conexión a base de datos: " . $e->getMessage();
        }
    }

    public function getProductById($id_producto)
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("SELECT * FROM producto WHERE id_producto = ?");
            $sentencia->bindParam(1, $id_producto);
            $sentencia->execute();
            return $sentencia->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "No se pudo obtener el producto " . $e->getMessage();
        }
    }

    public static function getTopLikedProducts()
    {
        try {
            $conn = getDBConnection();
            $query = $conn->query("SELECT * FROM producto ORDER BY likes DESC LIMIT 3");
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error al obtener los 3 productos con más likes: " . $e->getMessage();
            return [];
        }
    }

    public static function getProductBySport($deporte)
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("SELECT * FROM producto WHERE deporte = ?");
            $sentencia->bindParam(1, $deporte);
            $sentencia->execute();
            $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error al obtener el producto: " . $e->getMessage();
        }
    }
}
