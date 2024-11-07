<?php

require_once "../../config/dbConnection.php";

class Producto
{
    private $nombre_producto;
    private $precio;
    private $id_producto;
    private $likes;
    private $deporte;
    private $descripcion;

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

    public static function getAllProducts()
    {
        try {
            $conn = getDBConnection();
            $query = $conn->query("SELECT * FROM producto");
            $result = $query->fetchAll(PDO::FETCH_ASSOC); // El assoc devuelve cada fila como array asociativo
            return $result;
        } catch (PDOException $e) {
            echo "Error al ejecutar la query";
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
            echo "Error en la conexión a base de datos";
        }
    }

    public function create()
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("INSERT INTO producto (nombre_producto, precio, descripcion, deporte, likes) VALUES (?,?,?,?,?)");
            $sentencia->bindParam(1, $this->nombre_producto);
            $sentencia->bindParam(2, $this->precio);
            $sentencia->bindParam(3, $this->descripcion);
            $sentencia->bindParam(4, $this->deporte);
            $sentencia->bindParam(5, $this->likes);
            $sentencia->execute();
        } catch (PDOException $e) {
            echo "Error en la conexión a base de datos";
        }
    }

    public function updateProduct()
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("UPDATE producto SET nombre_producto = ?, precio = ?, descripcion = ?, deporte = ?, likes = ? WHERE id_producto = ?");
            $sentencia->bindParam(1, $this->nombre_producto);
            $sentencia->bindParam(2, $this->precio);
            $sentencia->bindParam(3, $this->descripcion);
            $sentencia->bindParam(4, $this->deporte);
            $sentencia->bindParam(5, $this->likes);
            $sentencia->bindParam(6, $this->id_producto); 
            $sentencia->execute();
        } catch (PDOException $e) {
            echo "Error en la conexión a base de datos";
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
}
?>
