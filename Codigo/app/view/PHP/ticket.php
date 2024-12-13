
<!-- ESTE DISEÑO Y PARTE DEL HTML ESTA SACADO DE https://uiverse.io/SSpisso/kind-cobra-45-->

<style>
.popup {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: none;
    width: 400px;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    z-index: 1000;
}

.popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 999;
    display: none;
}

.container {
    display: grid;
    grid-template-columns: auto;
    gap: 20px;
}

.tarjeta {
    width: 400px;
    background: rgb(255, 250, 235);
    box-shadow: 0px 187px 75px rgba(0, 0, 0, 0.01), 0px 105px 63px rgba(0, 0, 0, 0.05), 0px 47px 47px rgba(0, 0, 0, 0.09), 0px 12px 26px rgba(0, 0, 0, 0.1), 0px 0px 0px rgba(0, 0, 0, 0.1);
}

.title {
    width: 100%;
    height: 40px;
    position: relative;
    display: flex;
    align-items: center;
    padding-left: 20px;
    border-bottom: 1px solid rgba(16, 86, 82, .75);
    font-weight: 700;
    font-size: 11px;
    color: #000000;
}

.promo form {
    display: grid;
    grid-template-columns: 1fr 80px;
    gap: 10px;
    padding: 0px;
}

.input_field {
    width: auto;
    height: 36px;
    padding: 0 0 0 12px;
    border-radius: 5px;
    outline: none;
    border: 1px solid rgb(16, 86, 82);
    background-color: rgb(251, 243, 228);
}

.promo form button {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    padding: 10px 18px;
    gap: 10px;
    width: 100%;
    height: 36px;
    background: rgba(16, 86, 82, .75);
    border-radius: 5px;
    border: 0;
    font-weight: 600;
    font-size: 12px;
    color: #000000;
}

.pago .detalle {
    display: grid;
    grid-template-columns: 10fr 1fr;
    padding: 0px;
    gap: 5px;
}

.pago .detalle span:nth-child(odd) {
    font-size: 12px;
    font-weight: 600;
    color: #000000;
}

.payments .detalle span:nth-child(even) {
    font-size: 13px;
    font-weight: 600;
    color: #000000;
}

.compra .footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 10px 10px 20px;
    background-color: rgba(16, 86, 82, .5);
}

.price {
    font-size: 22px;
    color: #2B2B2F;
    font-weight: 900;
}

.compra .compra-btn {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 150px;
    height: 36px;
    background: rgba(16, 86, 82, .55);
    border-radius: 7px;
    border: 1px solid rgb(16, 86, 82);
    color: #000000;
    font-size: 13px;
    font-weight: 600;
}

.compra-btn:hover{
  cursor:pointer;  
}

</style>

<?php
if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];
    $producto = $productController->getProductsById($id_producto); 
} else {
    echo "Producto no encontrado.";
    exit;
}

$precio = $producto['precio']; 
$envio = 5.00; 
$impuesto = 0.21 * $precio;
$total = $precio + $envio + $impuesto;
$descuento = 0;  

if (isset($_POST['codigo_promocional'])) {
    $codigo_promocional = $_POST['codigo_promocional'];
    if ($codigo_promocional == 'codigo1' || $codigo_promocional == 'codigo2') {
        $descuento = 0.10 * $precio;  
    }
}

$total_con_descuento = $total - $descuento;

// Verificar si se está comprando
if (isset($_POST['accion']) && $_POST['accion'] == 'comprar') {
  $nombre_usuario = isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : null;
  if ($nombre_usuario) {
      $pedidoController = new PedidoController();
      $pedidoController->crearPedido($id_producto, $nombre_usuario);
      $mensajeCompra = "Pedido realizado con éxito.";
  } else {
      $mensajeCompra = "Debes iniciar sesión para realizar la compra.";
  }
}
?>

<div class="container">
  <div class="tarjeta cart">
      <label class="title">compra</label>
      <div class="steps">
          <div class="step">
              <div>
                  <span>PRODUCTO</span>
                  <p><?= htmlspecialchars($producto['nombre_producto']) ?></p>
                  <p>Precio: <?= htmlspecialchars($producto['precio']) ?>€</p>
              </div>
              <hr>
              <div>
                  <span>DIRECCIÓN DE ENVÍO</span>
                  <p><?= htmlspecialchars($usuario->getDireccion()) ?></p>
              </div>
              <hr>
              <div>
                  <span>MÉTODO DE PAGO</span>
                  <p>Visa</p>
                  <p>**** **** **** 4243</p>
              </div>
              <hr>
              <div class="promo">
                  <span>CODIGO PROMOCIONAL</span>
                  <form method="POST" class="form">
                      <input type="text" name="codigo_promocional" placeholder="Introduce un código válido" class="input_field">
                      <button type="submit">Aplicar</button>
                  </form>
                  <?php
                  if ($descuento > 0) {
                      echo "<p>Descuento aplicado: " . number_format($descuento, 2) . "€</p>";
                  }
                  ?>
              </div>
              <hr>
              <div class="pago">
                  <span>PAGO</span>
                  <div class="detalle">
                      <span>Subtotal:</span>
                      <span><?= htmlspecialchars($producto['precio']) ?>€</span>
                      <span>Envío:</span>
                      <span><?= $envio ?>€</span>
                      <span>IVA:</span>
                      <span><?= number_format($impuesto, 2) ?>€</span>
                      <span>Descuento:</span>
                      <span>-<?= number_format($descuento, 2) ?>€</span>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="tarjeta compra">
      <div class="footer">
          <label class="price"><?= number_format($total_con_descuento, 2) ?>€</label>
          <form method="POST">
              <input type="hidden" name="accion" value="comprar">
              <button class="compra-btn" type="submit">Comprar</button>
          </form>
      </div>
  </div>
</div>