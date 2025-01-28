<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../rutas.php');
require_once(CONFIG . 'dbConnection.php');
require_once(MODEL . 'Producto.php');
require_once(CONTROLLER . 'ProductoController.php');

final class TestRuben extends TestCase
{


    public function testFormularioDeporteFutbol()
    {
        // Simulamos un formulario enviado para "futbol"
        $_POST['deporte'] = 'futbol';

        // Verificamos que el valor de 'deporte' sea el esperado
        $this->assertEquals('futbol', $_POST['deporte']);
    }

    public function testFormularioDeporteTenis()
    {
        // Simulamos un formulario enviado para "tenis"
        $_POST['deporte'] = 'tenis';

        // Verificamos que el valor de 'deporte' sea el esperado
        $this->assertEquals('tenis', $_POST['deporte']);
    }

    public function testFormularioDeporteBaloncesto()
    {
        // Simulamos un formulario enviado para "baloncesto"
        $_POST['deporte'] = 'baloncesto';

        // Verificamos que el valor de 'deporte' sea el esperado
        $this->assertEquals('baloncesto', $_POST['deporte']);
    }

    public function testFormularioDeporteBoxeo()
    {
        // Simulamos un formulario enviado para "boxeo"
        $_POST['deporte'] = 'boxeo';

        // Verificamos que el valor de 'deporte' sea el esperado
        $this->assertEquals('boxeo', $_POST['deporte']);
    }
}

