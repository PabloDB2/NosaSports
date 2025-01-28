<?php

use PHPUnit\Framework\TestCase;

// require_once '..\..\Codigo\app\view\PHP\login.php';
require_once 'C:\xampp\htdocs\NosaSports\Codigo\app\controller\UsuarioController.php';
require_once 'C:\xampp\htdocs\NosaSports\Codigo\app\model\Usuario.php';

final class TestRuben extends TestCase
{


    public function testCrearUsuarioExitoso()
    {
        // Simulando los datos del formulario de registro
        $nombre_usuario = 'nuevo_usuario_test';
        $correo = 'nuevo@usuario.com';
        $nombreapellidos = 'Nuevo Usuario Test';
        $direccion = 'Calle Ficticia 123';
        $contraseña = "contraseña_segura123";

        // Usamos el controlador para crear el usuario
        $usuarioController = new UsuarioController();
        $resultado = $usuarioController->crearUsuario($nombre_usuario, $correo, $nombreapellidos, $contraseña, $direccion);

        $resultadoEsperado = ['nuevo_usuario_test','nuevo@usuario.com','Nuevo Usuario Test','Calle Ficticia 123',"contraseña_segura123"];
        // Verificar que el usuario fue creado correctamente
    
        $this->assertEquals($nombre_usuario, $resultado->getNombreUsuario());
        $this->assertEquals($correo, $resultado->getCorreo());
        $this->assertEquals($nombreapellidos, $resultado->getNombreApellidos());
        $this->assertEquals($direccion, $resultado->getDireccion());
    }
}
