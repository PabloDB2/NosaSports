<?php
require_once(__DIR__ . '/../../../rutas.php');
require_once(CONTROLLER . 'UsuarioController.php'); 
require_once(MODEL . 'Usuario.php'); 

session_start();
?>

<br>
<h3>Registro</h3>

<form action="registro.php" method="POST">
    <input type="hidden" name="formCreate" value="crearUsuario">

    Correo: <input type="text" name="correo" required><br>
    Contraseña: <input type="password" name="contraseña" required><br>
    Nombre de usuario: <input type="text" name="nombre_usuario" required><br>
    Nombre y apellidos: <input type="text" name="nombreapellidos" required><br>
    Direccion: <input type="textarea" name="direccion" required><br>

    <input type="submit" value="Crear Cuenta">
</form>

<?php

$usuarioController = new UsuarioController();
$usuarios = $usuarioController->getAllUsers();

// Crear usuario
if (isset($_POST['formCreate']) && $_POST['formCreate'] == 'crearUsuario') {
    if (isset($_POST["correo"]) && isset($_POST["contraseña"]) && isset($_POST["nombre_usuario"]) && isset($_POST["nombreapellidos"]) && isset($_POST["direccion"])) {
        $usuarioController->crearUsuario($_POST["nombre_usuario"], $_POST["correo"], $_POST["nombreapellidos"], $_POST["contraseña"], $_POST["direccion"]);
        echo "<p>Se ha creado el usuario " . htmlspecialchars($_POST["nombre_usuario"]) . ".</p>";
    } else {
        echo "<p>No has introducido un nombre de usuario válido.</p>";
    }
    exit();
}

?>
