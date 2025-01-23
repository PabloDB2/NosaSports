<?php
require_once(__DIR__ . '/../../rutas.php');
require_once(CONFIG . 'dbConnection.php'); // ruta de config definido en rutas.php

/**
 * Clase que representa un producto en el sistema
 *
 * @package Productos
 * @author NosaSports <nosasports@store.com>
 */
class Producto
{
    /** @var string Nombre del producto */
    private $nombre_producto;

    /** @var float Precio del producto */

    private $precio;

    /** @var int ID del producto */
    private $id_producto;

    /** @var int Número de likes del producto */
    private $likes;

    /** @var string Deporte al que pertenece el producto */
    private $deporte;

    /** @var string Descripción del producto */
    private $descripcion;

    /** @var string Ruta de la imagen del producto */
    private $imagen;

/**
     * Obtiene el nombre del producto
     *
     * @return string Nombre del producto
     */
    public function getNombre()
    {
        return $this->nombre_producto;
    }

    /**
     * Obtiene el precio del producto
     *
     * @return float Precio del producto
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Obtiene el ID del producto
     *
     * @return int ID del producto
     */
    public function getIdProducto()
    {
        return $this->id_producto;
    }

    /**
     * Obtiene la descripción del producto
     *
     * @return string Descripción del producto
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Obtiene los likes del producto
     *
     * @return int Número de likes del producto
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Obtiene el deporte al que pertenece el producto
     *
     * @return string Deporte al que pertenece el producto
     */
    public function getDeporte()
    {
        return $this->deporte;
    }

    /**
     * Obtiene la imagen del producto
     *
     * @return string Ruta de la imagen del producto
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Establece el nombre del producto
     *
     * @param string $nombre_producto Nombre del producto
     * @return void
     */
    public function setNombre($nombre_producto)
    {
        $this->nombre_producto = $nombre_producto;
    }

    /**
     * Establece el precio del producto
     *
     * @param float $precio Precio del producto
     * @return void
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * Establece el ID del producto
     *
     * @param int $id_producto ID del producto
     * @return void
     */
    public function setIdProducto($id_producto)
    {
        $this->id_producto = $id_producto;
    }

    /**
     * Establece la descripción del producto
     *
     * @param string $descripcion Descripción del producto
     * @return void
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * Establece los likes del producto
     *
     * @param int $likes Número de likes del producto
     * @return void
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;
    }

    /**
     * Establece el deporte al que pertenece el producto
     *
     * @param string $deporte Deporte al que pertenece el producto
     * @return void
     */
    public function setDeporte($deporte)
    {
        $this->deporte = $deporte;
    }

     /**
     * Establece la imagen del producto
     *
     * @param string $imagen Ruta de la imagen del producto
     * @return void
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    /**
     * Obtiene todos los productos de la base de datos
     *
     * @return array Lista de productos
     */
    public static function getAllProducts()
    {
        try {
            $conn = getDBConnection();
            $query = $conn->query("SELECT * FROM producto");
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error al ejecutar la query: " . $e->getMessage();
            return []; // necesario para que siempre devuelva algo (en la documentacion indicamos 
                        // que siempre debe esperar un array sea cual sea el resultado del try-catch)

        }
    }

     /**
     * Obtiene productos por nombre
     *
     * @param string $nombre_producto Nombre del producto
     * @return array Lista de productos que coinciden con el nombre
     */
    public static function getProductByName($nombre_producto)
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("SELECT * FROM producto WHERE nombre_producto LIKE ?");
            $searchTerm = "%" . $nombre_producto . "%"; // para que no busque la palabra literal y sirva con cualquier letra
            $sentencia->bindParam(1, $searchTerm);
            $sentencia->execute();
            $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error al obtener el producto: " . $e->getMessage();
            return [];
        }
    }

    /**
     * Crea un nuevo producto en la base de datos
     *
     * @return void
     */
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

    /**
     * Actualiza un producto existente en la base de datos
     *
     * @return void
     */
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

    /**
     * Elimina un producto de la base de datos
     *
     * @return void
     */
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

    /**
     * Obtiene un producto por su ID
     *
     * @param int $id_producto ID del producto
     * @return array Datos del producto
     */
    public static function getProductById($id_producto)
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("SELECT * FROM producto WHERE id_producto = ?");
            $sentencia->bindParam(1, $id_producto);
            $sentencia->execute();
            return $sentencia->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "No se pudo obtener el producto " . $e->getMessage();
            return [];
        }
    }

     /**
     * Obtiene los productos más populares (los que tienen más likes)
     *
     * @return array Lista de los tres productos más populares
     */
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

    /**
     * Obtiene productos filtrados por deporte
     *
     * @param string $deporte Deporte asociado al producto
     * @return array Lista de productos de ese deporte
     */
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
            return [];
        }
    }

    /**
     * Realiza una búsqueda de productos por nombre
     *
     * @param string $search Término de búsqueda
     * @param string|null $deporte Deporte opcional para filtrar
     * @return array Lista de productos que coinciden con la búsqueda
     */
    public static function searchProducts($search, $deporte = null)
    {
        try {
            $conn = getDBConnection();
            $sql = "SELECT * FROM producto WHERE nombre_producto LIKE ?";
            $params = ["%$search%"];
            $sentencia = $conn->prepare($sql);
            $sentencia->execute($params);
            $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error al realizar la búsqueda: " . $e->getMessage();
            return [];
        }
    }

    public function updateNombreProducto($nuevoNombreProducto)
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("UPDATE producto SET nombre_producto = ? WHERE id_producto = ?");
            $sentencia->bindParam(1, $nuevoNombreProducto);
            $sentencia->bindParam(2, $this->id_producto); //de donde saca este id
            $sentencia->execute();
            $this->nombre_producto = $nuevoNombreProducto;
        } catch (PDOException $e) {
            echo "Error al actualizar el nombre de usuario: " . $e->getMessage();
        }
    }

    public function updatePrecioProducto($nuevoPrecioProducto)
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("UPDATE producto SET precio = ? WHERE id_producto = ?");
            $sentencia->bindParam(1, $nuevoPrecioProducto);
            $sentencia->bindParam(2, $this->id_producto);
            $sentencia->execute();
            $this->precio = $nuevoPrecioProducto ;
        } catch (PDOException $e) {
            echo "Error al actualizar el nombre de usuario: " . $e->getMessage();
        }
    }

    public function updateLikesProducto($nuevoLikesProducto)
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("UPDATE producto SET likes = ? WHERE id_producto = ?");
            $sentencia->bindParam(1, $nuevoLikesProducto);
            $sentencia->bindParam(2, $this->id_producto);
            $sentencia->execute();
            $this->likes = $nuevoLikesProducto ;
        } catch (PDOException $e) {
            echo "Error al actualizar el nombre de usuario: " . $e->getMessage();
        }
    }


    public function updateDescripcionProducto($nuevaDescripcionProducto){
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("UPDATE producto SET descripcion =? WHERE id_producto =?");
            $sentencia->bindParam(1, $nuevaDescripcionProducto);
            $sentencia->bindParam(2, $this->id_producto);
            $sentencia->execute();
            $this->descripcion = $nuevaDescripcionProducto ;
        } catch (PDOException $e) {
            echo "Error al actualizar el nombre de usuario: ". $e->getMessage();
        }
    }

    public function updateDeporteProducto($nuevoDeporteProducto){
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("UPDATE producto SET deporte =? WHERE id_producto =?");
            $sentencia->bindParam(1, $nuevoDeporteProducto);
            $sentencia->bindParam(2, $this->id_producto);
            $sentencia->execute();
            $this->deporte = $nuevoDeporteProducto ;
        } catch (PDOException $e) {
            echo "Error al actualizar el nombre de usuario: ". $e->getMessage();
        }
    }


    public function updateImagenProducto($nuevaImagenProducto){
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("UPDATE producto SET imagen =? WHERE id_producto =?");
            $sentencia->bindParam(1, $nuevaImagenProducto);
            $sentencia->bindParam(2, $this->id_producto);
            $sentencia->execute();
            $this->imagen = $nuevaImagenProducto ;
        } catch (PDOException $e) {
            echo "Error al actualizar el nombre de usuario: ". $e->getMessage();
        }
    }

    



}

    
