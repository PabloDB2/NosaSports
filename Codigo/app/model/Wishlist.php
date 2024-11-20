<?php
require_once(__DIR__ . '/../../rutas.php');
require_once(CONFIG . 'dbConnection.php'); // ruta de config definido en rutas.php

class Wishlist
{
    private $id_wishlist;
    private $nombre_usuario;
    private $id_producto;

    // Getters
    public function getIdWishlist()
    {
        return $this->id_wishlist;
    }

    public function getNombreUsuario()
    {
        return $this->nombre_usuario;
    }

    public function getIdProducto()
    {
        return $this->id_producto;
    }

    // Setters
    public function setIdWishlist($id_wishlist)
    {
        $this->id_wishlist = $id_wishlist;
    }

    public function setNombreUsuario($nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;
    }

    public function setIdProducto($id_producto)
    {
        $this->id_producto = $id_producto;
    }

    public static function getAllWishlists()
    {
        try {
            $conn = getDBConnection();
            $query = $conn->query("SELECT * FROM wishlist");
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener las wishlists: " . $e->getMessage();
        }
    }

    public static function getWishlistByUser($nombre_usuario)
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("SELECT * FROM wishlist WHERE nombre_usuario = ?");
            $sentencia->bindParam(1, $nombre_usuario);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener la wishlist del usuario: " . $e->getMessage();
        }
    }

    public static function getWishlistById($id_wishlist)
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("SELECT * FROM wishlist WHERE id_wishlist = ?");
            $sentencia->bindParam(1, $id_wishlist);
            $sentencia->execute();
            return $sentencia->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener la wishlist: " . $e->getMessage();
        }
    }

    public function addProductToWishlist()
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("INSERT INTO wishlist (nombre_usuario, id_producto) VALUES (?, ?)");
            $sentencia->bindParam(1, $this->nombre_usuario);
            $sentencia->bindParam(2, $this->id_producto);
            $sentencia->execute();
        } catch (PDOException $e) {
            echo "Error al añadir el producto a la wishlist: " . $e->getMessage();
        }
    }

    public function removeProductFromWishlist()
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("DELETE FROM wishlist WHERE id_wishlist = ?");
            $sentencia->bindParam(1, $this->id_wishlist);
            $sentencia->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar el producto de la wishlist: " . $e->getMessage();
        }
    }
}
