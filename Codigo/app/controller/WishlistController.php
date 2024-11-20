<?php
require_once(__DIR__ . '/../../rutas.php'); 
require_once(CONFIG . 'dbConnection.php'); // ruta de config definido en rutas.php

class WishlistController {
    public function getAllWishlists() {
        return Wishlist::getAllWishlists();
    }

    public function getWishlistByUser($nombre_usuario) {
        return Wishlist::getWishlistByUser($nombre_usuario);
    }

    public function getWishlistById($id_wishlist) {
        return Wishlist::getWishlistById($id_wishlist);
    }

    public function addProductToWishlist($nombre_usuario, $id_producto) {
        $wishlist = new Wishlist();
        $wishlist->setNombreUsuario($nombre_usuario);
        $wishlist->setIdProducto($id_producto);

        $wishlist->addProductToWishlist();
    }

    public function removeProductFromWishlist($id_wishlist) {
        $wishlist = new Wishlist();
        $wishlist->setIdWishlist($id_wishlist);

        $wishlist->removeProductFromWishlist();
    }
}
?>
