<?php
require_once(__DIR__ . '/../../rutas.php'); 
require_once(CONFIG . 'dbConnection.php'); // ruta de config definido en rutas.php
require_once(MODEL . 'Reseña.php');  // Agregar esta línea

class UsuarioController {
    public function getAllUsers() {
        return Usuario::getAllUsers();
    }

    public function getUserByName($nombre_usuario) {
        return Usuario::getUserByName($nombre_usuario);
    }

    public function crearUsuario($nombre_usuario, $correo, $nombreapellidos, $contraseña, $direccion) {
        $nuevoUsuario = new Usuario();
        $nuevoUsuario->setNombreUsuario($nombre_usuario);
        $nuevoUsuario->setCorreo($correo); 
        $nuevoUsuario->setNombreApellidos($nombreapellidos);
        $nuevoUsuario->setContraseña($contraseña);
        $nuevoUsuario->setDireccion($direccion);

        $nuevoUsuario->create();
    }

    public function modificarUsuario($nombre_usuario, $correo, $nombreapellidos, $contraseña, $direccion) {
        $usuario = new Usuario();
        $usuario->setNombreUsuario($nombre_usuario);
        $usuario->setCorreo($correo);
        $usuario->setNombreApellidos($nombreapellidos);
        $usuario->setContraseña($contraseña);
        $usuario->setDireccion($direccion);

        $usuario->updateUser(); 
    }

    public function eliminarUsuario($nombre_usuario)
    {
        // debido a la foreign key de nombre_usuario_reseña hace falta 
        // borrar las reseñas de un usuario antes de eliminarlo
        Reseña::deleteReseñasByUsuario($nombre_usuario);
        $usuario = new Usuario();
        $usuario->setNombreUsuario($nombre_usuario);
        $usuario->deleteUser(); 
    }

    public function modificarNombreUsuario($nombre_usuario, $nuevoNombreUsuario) {
        $usuario = new Usuario();
        $usuario->setNombreUsuario($nombre_usuario);
        $usuario->updateNombreUsuario($nuevoNombreUsuario);
    }

    public function modificarContraseña($nombre_usuario, $nuevaContraseña) {
        $usuario = new Usuario();
        $usuario->setNombreUsuario($nombre_usuario);
        $usuario->updateContraseña($nuevaContraseña);
    }

    public function modificarNombreApellidos($nombre_usuario, $nuevoNombreApellidos) {
        $usuario = new Usuario();
        $usuario->setNombreUsuario($nombre_usuario);
        $usuario->updateNombreApellidos($nuevoNombreApellidos);
    }

    public function modificarDireccion($nombre_usuario, $nuevaDireccion) {
        $usuario = new Usuario();
        $usuario->setNombreUsuario($nombre_usuario);
        $usuario->updateDireccion($nuevaDireccion);
    }
}
?>
