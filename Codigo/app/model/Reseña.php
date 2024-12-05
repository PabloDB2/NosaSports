<?php
require_once(__DIR__ . '/../../rutas.php');
require_once(CONFIG . 'dbConnection.php'); 

class Reseña
{
    private $id_reseña;
    private $texto;
    private $puntuacion;
    private $nombre_usuario_reseña;
    private $id_producto_reseña;

    public function getIdreseña()
    {
        return $this->id_reseña;
    }

    public function getTexto()
    {
        return $this->texto;
    }

    public function getPuntuacion()
    {
        return $this->puntuacion;
    }

    public function getNombreUsuarioreseña()
    {
        return $this->nombre_usuario_reseña;
    }

    public function getIdProductoreseña()
    {
        return $this->id_producto_reseña;
    }

    public function setTexto($texto)
    {
        $this->texto = $texto;
    }

    public function setPuntuacion($puntuacion)
    {
        $this->puntuacion = $puntuacion;
    }

    public function setNombreUsuarioReseña($nombre_usuario_reseña)
    {
        $this->nombre_usuario_reseña = $nombre_usuario_reseña;
    }

    public function setIdProductoReseña($id_producto_reseña)
    {
        $this->id_producto_reseña = $id_producto_reseña;
    }

    public static function getAllReseñas()
    {
        try {
            $conn = getDBConnection();
            $query = $conn->query("SELECT * FROM reseña");
            return $query->fetchAll(PDO::FETCH_ASSOC); 
        } catch (PDOException $e) {
            echo "Error al obtener las reseñas: " . $e->getMessage();
        }
    }

    public static function getReseñasByProduct($id_producto)
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("SELECT * FROM reseña WHERE id_producto_reseña = ?");
            $sentencia->bindParam(1, $id_producto, PDO::PARAM_INT);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC); 
        } catch (PDOException $e) {
            echo "Error al obtener las reseñas del producto: " . $e->getMessage();
        }
    }

     // Crear una nueva reseña
     public function create()
     {
         try {
             $conn = getDBConnection();
             $sentencia = $conn->prepare("INSERT INTO reseña (texto, puntuacion, nombre_usuario_reseña, id_producto_reseña) VALUES (?, ?, ?, ?)");
             $sentencia->bindParam(1, $this->texto);
             $sentencia->bindParam(2, $this->puntuacion);
             $sentencia->bindParam(3, $this->nombre_usuario_reseña);
             $sentencia->bindParam(4, $this->id_producto_reseña);
             $sentencia->execute();
         } catch (PDOException $e) {
             echo "Error al crear la reseña: " . $e->getMessage();
         }
     }
 

    public static function deleteReseña($id_reseña)
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("DELETE FROM reseña WHERE id_reseña = ?");
            $sentencia->bindParam(1, $id_reseña, PDO::PARAM_INT);
            $sentencia->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar la reseña: " . $e->getMessage();
        }
    }
}
