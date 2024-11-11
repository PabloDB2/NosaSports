<?php
require_once(__DIR__ . '/../../../rutas.php');
require_once(CONTROLLER . 'UsuarioController.php');
require_once(MODEL . 'Usuario.php');

session_start();

if (isset($_SESSION['nombre_usuario'])) {
    header("Location: inicio.php"); // al logearse redirige a inicio
    exit();
}

?>

<br>
<h3>Iniciar Sesión</h3>

<form action="login.php" method="POST">
    Nombre de usuario: <input type="text" name="nombre_usuario" required><br>
    Contraseña: <input type="password" name="contraseña" required><br>
    <input type="submit" value="Iniciar sesión">
</form>

<?php

$usuarioController = new UsuarioController();

if (isset($_POST['nombre_usuario'], $_POST['contraseña'])) {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contraseña = $_POST['contraseña'];

    $usuario = $usuarioController->getUserByName($nombre_usuario);

    if ($usuario==true) {
        if ($contraseña == $usuario->getContraseña()) {
            $_SESSION['nombre_usuario'] = $usuario->getNombreUsuario();
            header("Location: inicio.php"); 
            exit();
        } else {
            echo "<p>Contraseña incorrecta.</p>";
        }
    } else {
        echo "<p>El usuario no existe</p>";
    }
}

?>
