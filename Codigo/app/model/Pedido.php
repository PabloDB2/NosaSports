<?php
require_once(__DIR__ . '/../../rutas.php');
require_once(CONFIG . 'dbConnection.php'); // Asegúrate de que la conexión a la base de datos esté correctamente definida

class Pedido {
    private $id_pedido;
    private $id_producto;
    private $nombre_usuario;

    // Getter y Setter para los atributos
    public function setIdPedido($id_pedido) {
        $this->id_pedido = $id_pedido;
    }

    public function setIdProducto($id_producto) {
        $this->id_producto = $id_producto;
    }

    public function setNombreUsuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    // Método para crear un nuevo pedido
    public function crearPedido($id_producto, $nombre_usuario) {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("INSERT INTO pedido (id_producto, nombre_usuario) VALUES (?, ?)");
            $sentencia->bindParam(1, $id_producto);
            $sentencia->bindParam(2, $nombre_usuario);
            $sentencia->execute();
        } catch (PDOException $e) {
            echo "Error al crear el pedido: " . $e->getMessage();
        }
    }
}
?>
