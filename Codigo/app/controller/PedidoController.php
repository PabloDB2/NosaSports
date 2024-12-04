<?php
require_once(__DIR__ . '/../../rutas.php');
require_once(MODEL . 'Pedido.php');

class PedidoController {

    public function crearPedido($id_producto, $nombre_usuario) {
        $pedido = new Pedido();
        $pedido->crearPedido($id_producto, $nombre_usuario);
    }
}
?>
