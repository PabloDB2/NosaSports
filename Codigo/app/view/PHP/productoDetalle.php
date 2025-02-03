<?php
require_once(__DIR__ . '/../../../rutas.php');
require_once(CONTROLLER . 'ProductoController.php');
require_once(CONTROLLER . 'PedidoController.php');
require_once(MODEL . 'Producto.php');
require_once(CONTROLLER . 'ReseñaController.php');
require_once(CONTROLLER . 'UsuarioController.php');
require_once(MODEL . 'Usuario.php');

$productController = new ProductoController();
$pedidoController = new PedidoController();
$resenaController = new ReseñaController();
$usuarioController = new UsuarioController();

session_start();

if (isset($_SESSION['nombre_usuario'])) {

    $nombre_usuario = $_SESSION['nombre_usuario'];
} else {

    $nombre_usuario = null;
}

//Esta linea da problemas(comentada por si acaso)
// $nombre_usuario = $_SESSION['nombre_usuario']; 

$usuario = $usuarioController->getUserByName($nombre_usuario);

// Usamos $_GET para obtener el ID del producto
if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];
} else {
    echo "Producto no encontrado.";
    exit;
}

$producto = $productController->getProductsById($id_producto);

if (!$producto) {
    echo "Producto no encontrado.";
    exit;
}

if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}

if (!isset($_SESSION['entrega'])) {
    $_SESSION['entrega'] = [];
}

if (isset($_POST['accion']) && $_POST['accion'] === 'comprar') {
   
        $_SESSION['entrega'] = $id_producto;    
}

// Añadir a wishlist
if (isset($_POST['accion']) && $_POST['accion'] === 'añadirAWishlist') {
    if (!in_array($id_producto, $_SESSION['wishlist'], true)) {
        $_SESSION['wishlist'][] = $id_producto;
        $mensaje = "¡Producto añadido a tu Wishlist!";
    } else {
        $mensaje = "Este producto ya está en tu Wishlist.";
    }
}

// Dar like
if (isset($_POST['accion']) && $_POST['accion'] === 'darLike') {
    if (!isset($_SESSION['likes'][$id_producto])) {
        $_SESSION['likes'][$id_producto] = true;
        $producto['likes'] += 1;
    } else {
        unset($_SESSION['likes'][$id_producto]);
        $producto['likes'] -= 1;
    }

    // Actualiza los datos del producto
    $productController->modificarProducto($producto['id_producto'], $producto['nombre_producto'], $producto['precio'], $producto['descripcion'], $producto['deporte'], $producto['likes'], $producto['imagen']);
}

// Verificar si el usuario está logueado antes de permitir la compra
if (isset($_POST['accion']) && $_POST['accion'] === 'comprar') {
    
        // Crear un pedido
        $pedidoController->crearPedido($id_producto, $nombre_usuario);

        
        // $mensajeCompra = "Pedido realizado con éxito";
        header("Location: entrega.php");
        exit();
     } 

 


// Publicar reseña
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'publicarReseña') {
    if ($nombre_usuario) {
        $texto = $_POST['texto'];
        $puntuacion = $_POST['puntuacion'];

        if ($texto && $puntuacion) {
            $resenaController->crearReseña($texto, $puntuacion, $nombre_usuario, $id_producto);
            $mensajeReseña = "¡Reseña publicada con éxito!";
            
            header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $id_producto); // Redirigir con la misma id
            exit;
        } else {
            $mensajeReseña = "Por favor, completa todos los campos para publicar tu reseña.";
        }
    } else {
        $mensajeReseña = "Debes iniciar sesión para publicar una reseña.";
    }
}

$resenas = $resenaController->getReseñasByProducto($id_producto);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <link rel="stylesheet" href="../CSS/productoDetalle.css">
</head>

<body>
    <?php include "../Generales/nav.php" ?>

    <div class="main-container">
        <div class="detalleProducto">
            <div class="imagenProducto">
                <img src="<?= htmlspecialchars($producto['imagen']) ?>" alt="Imagen del producto">
                <div class="likeContainer">
                    <form action="" method="POST" class="formLike">
                        <input type="hidden" name="accion" value="darLike">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($producto['id_producto']) ?>">
                        <button type="submit" class="botonLike <?= isset($_SESSION['likes'][$producto['id_producto']]) ? 'dadoLike' : '' ?>">
                            &#x2764; <?= htmlspecialchars($producto['likes']) ?>
                        </button>
                    </form>
                </div>
            </div>
            <div class="infoProducto">
                <h1><?= htmlspecialchars($producto['nombre_producto']) ?></h1>
                <span class="categoria"><?= htmlspecialchars($producto['deporte']) ?></span>
                <p class="precio"><?= htmlspecialchars($producto['precio']) ?>€</p>
                <p class="descripcion"><?= htmlspecialchars($producto['descripcion']) ?></p>

                <?php if (isset($mensaje)) { ?>
                    <p class="mensajeAñadido"><?= $mensaje ?></p>
                <?php } ?>

                

                <div class="acciones">
                    <form id="form-comprar" action="" method="POST" style="display:none;">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($producto['id_producto']) ?>">
                        <input type="hidden" name="accion" value="comprar">
                    </form>
                    <?php
                    if($nombre_usuario){
                    ?>
                    <button type="button" class="botonComprar" onclick="confirmarCompra(event)">Comprar</button>
                    
                    <?php
                    } else {
                        $mensajeCompra = "Debes iniciar sesión para comprar.";
                    }
                    ?>

                    <?php if (isset($mensajeCompra)) { ?>
                    <p class="mensajeCompra"><?= $mensajeCompra ?></p>
                <?php } ?>
                    <div class="accionesBotones">
                        <form action="" method="POST">
                            <input type="hidden" name="accion" value="añadirAWishlist">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($producto['id_producto']) ?>">
                            <button type="submit" class="botonDeseados">Añadir a la wishlist</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-overlay"></div>
    <div class="popup">
    <?php include "ticket.php" ?>
    </div>

    <div class="reseñas">
        <h2>Reseñas del producto</h2>

        <!-- Formulario para publicar reseña -->
        <?php
        if ($nombre_usuario) {
        ?>
            <form action="" method="POST" class="formReseña">
                <input type="hidden" name="accion" value="publicarReseña">
                <input type="hidden" name="id" value="<?= htmlspecialchars($producto['id_producto']) ?>">
                <textarea name="texto" placeholder="Escribe tu reseña aquí..." required></textarea>
                <label for="puntuacion">Puntuación:</label>
                <select name="puntuacion" id="puntuacion" required>
                    <option value="1">1 estrella</option>
                    <option value="2">2 estrellas</option>
                    <option value="3">3 estrellas</option>
                    <option value="4">4 estrellas</option>
                    <option value="5">5 estrellas</option>
                </select>
                <button type="submit" class="botonPublicar">Publicar reseña</button>
            </form>
        <?php
        } else {
        ?>
            <p>Inicia sesión para dejar una reseña.</p>
        <?php
        }
        ?>

        <?php
        if (isset($mensajeReseña)) {
        ?>
            <p class="mensajeReseña"><?= htmlspecialchars($mensajeReseña) ?></p>
        <?php
        }
        ?>

        <!-- Listado de reseñas -->
        <div class="listaReseñas">
            <?php
            if ($resenas) {
                foreach ($resenas as $resena) {
            ?>
                    <div class="reseña">
                        <h3><?= htmlspecialchars($resena['nombre_usuario_reseña']) ?></h3>
                        <p class="puntuacion"><?= str_repeat('★', $resena['puntuacion']) ?></p>
                        <p><?= htmlspecialchars($resena['texto']) ?></p>
                    </div>
                <?php
                }
            } else {
                ?>
                <p>No hay reseñas para este producto.</p>
            <?php
            }
            ?>
        </div>
    </div>

    <?php include "../Generales/footer.php" ?>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
    // Ocultar el popup y el overlay al cargar la página
    document.querySelector('.popup').style.display = 'none';
    document.querySelector('.popup-overlay').style.display = 'none';

    // Agregar un evento para cerrar el popup si se hace clic en el overlay
    document.querySelector('.popup-overlay').addEventListener('click', function() {
        cancelarCompra();
    });
});

function confirmarCompra(event) {
    event.preventDefault();
    
    // Mostrar el popup y el fondo oscuro (overlay)
    document.querySelector('.popup').style.display = 'flex';
    document.querySelector('.popup-overlay').style.display = 'block';
}

function cancelarCompra() {
    // Ocultar el popup y el fondo oscuro (overlay)
    document.querySelector('.popup').style.display = 'none';
    document.querySelector('.popup-overlay').style.display = 'none';
}



    </script>
</body>

</html>