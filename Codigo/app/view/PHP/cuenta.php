<?php
require_once(__DIR__ . '/../../../rutas.php');
require_once(CONTROLLER . 'UsuarioController.php');
require_once(MODEL . 'Usuario.php');

session_start();

// comprobamos si el usuario no está logeado
if (!isset($_SESSION['nombre_usuario'])) {

    echo "<h3>No has iniciado sesión.</h3>";
    echo '<form action="login.php" method="get">
            <button type="submit">Iniciar sesión</button>
          </form>';
    exit();
}

$usuarioController = new UsuarioController();
$nombre_usuario = $_SESSION['nombre_usuario'];
$usuario = $usuarioController->getUserByName($nombre_usuario);

if (isset($_POST['modificar'])) {
    $nuevo_nombre_usuario = $_POST['nombre_usuario'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $direccion = $_POST['direccion'];

    $usuarioController->modificarUsuario($nombre_usuario, $correo, $usuario->getNombreApellidos(), $contraseña, $direccion);

    if ($nuevo_nombre_usuario !== $nombre_usuario) {
        $_SESSION['nombre_usuario'] = $nuevo_nombre_usuario;
        $usuarioController->modificarNombreUsuario($nombre_usuario, $nuevo_nombre_usuario);
    }

    header("Location: cuenta.php");
    exit();
}

// borrar cuenta
if (isset($_POST['borrar_cuenta'])) {
    $usuarioController->eliminarUsuario($nombre_usuario);
    session_destroy();
    header("Location: inicio.php");
}

// cerrar sesión
if (isset($_POST['cerrar_sesion'])) {
    session_destroy();
    header("Location: inicio.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta</title>
    <link rel="stylesheet" href="../CSS/cuenta.css">
</head>

<body>
    <?php include "../Generales/nav.php" ?>
    <h1>Datos personales</h2>
    <div class="content">
        <form action="cuenta.php" method="POST">
            <div>
                <b>Nombre de usuario:</b><br>
                <input type="text" name="nombre_usuario" value="<?= htmlspecialchars($usuario->getNombreUsuario()) ?>">
            </div>

            <div>
                <b>Correo:</b><br>
                <input type="email" name="correo" value="<?= htmlspecialchars($usuario->getCorreo()) ?>">
            </div>

            <div>
                <b>Contraseña:</b><br>
                <input type="password" name="contraseña" value="<?= htmlspecialchars($usuario->getContraseña()) ?>">
            </div>

            <div>
                <b>Dirección:</b><br>
                <input type="text" name="direccion" value="<?= htmlspecialchars($usuario->getDireccion()) ?>">
            </div>
            <br>
            <div>
                <button type="submit" name="modificar" style="background-color: rgb(104,86,52); color: white">Modificar</button>
            </div>
            <br>
            <div>
                <button type="submit" name="cerrar_sesion" style="background-color: red;  color: white">Cerrar sesión</button>
                <button type="submit" name="borrar_cuenta" style="background-color: red;  color: white">Borrar cuenta</button>
            </div>
        </form>
    </div>

</body>
    <?php include "../Generales/footer.php" ?>
</html>