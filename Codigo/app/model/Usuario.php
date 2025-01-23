<?php
require_once(__DIR__ . '/../../rutas.php');
require_once(CONFIG . 'dbConnection.php'); // ruta de config definido en rutas.php

/**
 * Clase que representa a un usuario en el sistema
 *
 * @package Usuarios
 * @author NosaSports <nosasports@store.com>
 */
class Usuario
{
    /** @var string Nombre de usuario (username) del usuario */
    private $nombre_usuario;

    /** @var string Correo electrónico del usuario */
    private $correo;

    /** @var string Nombre y apellidos del usuario */
    private $nombreapellidos; // nombre y apellidos van juntos

    /** @var string Dirección del usuario */
    private $direccion;

    /** @var string Contraseña del usuario */
    private $contraseña;


    /**
     * Obtiene el nombre de usuario
     *
     * @return string Nombre de usuario
     */
    public function getNombreUsuario()
    {
        return $this->nombre_usuario;
    }

    /**
     * Obtiene el correo electrónico del usuario
     *
     * @return string Correo electrónico del usuario
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Obtiene el nombre y apellidos del usuario
     *
     * @return string Nombre y apellidos del usuario
     */
    public function getNombreApellidos()
    {
        return $this->nombreapellidos;
    }

    /**
     * Obtiene la contraseña del usuario
     *
     * @return string Contraseña del usuario
     */
    public function getContraseña()
    {
        return $this->contraseña;
    }

     /**
     * Obtiene la dirección del usuario
     *
     * @return string Dirección del usuario
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

     /**
     * Establece el nombre de usuario
     *
     * @param string $nombre_usuario Nombre de usuario
     * @return void
     */
    public function setNombreUsuario($nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;
    }

     /**
     * Establece el correo electrónico del usuario
     *
     * @param string $correo Correo electrónico del usuario
     * @return void
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    /**
     * Establece el nombre y apellidos del usuario
     *
     * @param string $nombreapellidos Nombre y apellidos del usuario
     * @return void
     */
    public function setNombreApellidos($nombreapellidos)
    {
        $this->nombreapellidos = $nombreapellidos;
    }

     /**
     * Establece la dirección del usuario
     *
     * @param string $direccion Dirección del usuario
     * @return void
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * Establece la contraseña del usuario
     *
     * @param string $contraseña Contraseña del usuario
     * @return void
     */
    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;
    }

    /**
     * Obtiene todos los usuarios de la base de datos
     *
     * @return array Lista de usuarios
     */
    public static function getAllUsers()
    {
        try {
            $conn = getDBConnection();
            $query = $conn->query("SELECT * FROM usuario");
            $result = $query->fetchAll(PDO::FETCH_ASSOC); // El assoc devuelve cada fila como array asociativo
            return $result;
        } catch (PDOException $e) {
            echo "Error al ejecutar la query". $e->getMessage();
            return []; 
        }
    }

     /**
     * Obtiene un usuario por su nombre de usuario
     *
     * @param string $nombre_usuario Nombre de usuario
     * @return Usuario|null Objeto Usuario si existe, o null si no se encuentra
     */
    public static function getUserByName($nombre_usuario)
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("SELECT * FROM usuario WHERE nombre_usuario = ?");
            $sentencia->bindParam(1, $nombre_usuario);
            $sentencia->execute();
            $result = $sentencia->fetch(PDO::FETCH_ASSOC);

            // si el usuario existe, crea un objeto usuario
            if ($result == true) {
                $usuario = new Usuario();
                $usuario->setNombreUsuario($result['nombre_usuario']);
                $usuario->setCorreo($result['correo']);
                $usuario->setContraseña($result['contraseña']);
                $usuario->setNombreApellidos($result['nombreapellidos']);
                $usuario->setDireccion($result['direccion']);


                return $usuario;
            }
        } catch (PDOException $e) {
            echo "Error en la conexión a base de datos";
        }
    }

      /**
     * Crea un nuevo usuario
     *
     * @return void
     */
    public function create()
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("INSERT INTO usuario (nombre_usuario, correo, nombreapellidos, contraseña, direccion) VALUES (?,?,?,?,?)");
            $sentencia->bindParam(1, $this->nombre_usuario);
            $sentencia->bindParam(2, $this->correo);
            $sentencia->bindParam(3, $this->nombreapellidos);
            $sentencia->bindParam(4, $this->contraseña);
            $sentencia->bindParam(5, $this->direccion);
            $sentencia->execute();
        } catch (PDOException $e) {
            echo "Error en la conexión a base de datos";
        }
    }

     /**
     * Actualiza los datos del usuario en la base de datos
     *
     * @return void
     */
    public function updateUser()
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("UPDATE usuario SET nombre_usuario = ?, correo = ?, nombreapellidos = ?, contraseña = ?, direccion = ? WHERE nombre_usuario = ?");
            $sentencia->bindParam(1, $this->nombre_usuario);
            $sentencia->bindParam(2, $this->correo);
            $sentencia->bindParam(3, $this->nombreapellidos);
            $sentencia->bindParam(4, $this->contraseña);
            $sentencia->bindParam(5, $this->direccion);
            $sentencia->bindParam(6, $this->nombre_usuario);

            $sentencia->execute();
        } catch (PDOException $e) {
            echo "Error en la conexión a base de datos";
        }
    }

    /**
     * Elimina un usuario de la base de datos
     *
     * @return void
     */
    public function deleteUser()
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("DELETE FROM usuario WHERE nombre_usuario = ?");
            $sentencia->bindParam(1, $this->nombre_usuario);
            $sentencia->execute();
        } catch (PDOException $e) {
            echo "Error en la conexión a base de datos: " . $e->getMessage();
        }
    }

   /**
     * Actualiza el nombre de usuario en la base de datos
     *
     * 
     * @param string $nuevoNombreUsuario Nuevo nombre de usuario
     * @return void
     */
    
    public function updateNombreUsuario($nuevoNombreUsuario)
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("UPDATE usuario SET nombre_usuario = ? WHERE nombre_usuario = ?");
            $sentencia->bindParam(1, $nuevoNombreUsuario);
            $sentencia->bindParam(2, $this->nombre_usuario);
            $sentencia->execute();
            $this->nombre_usuario = $nuevoNombreUsuario;
        } catch (PDOException $e) {
            echo "Error al actualizar el nombre de usuario: " . $e->getMessage();
        }
    }

     /**
     * Actualiza la contraseña del usuario en la base de datos
     *
     * @param string $nuevaContraseña Nueva contraseña del usuario
     * @return void
     */
    public function updateContraseña($nuevaContraseña)
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("UPDATE usuario SET contraseña = ? WHERE nombre_usuario = ?");
            $sentencia->bindParam(1, $nuevaContraseña);
            $sentencia->bindParam(2, $this->nombre_usuario);
            $sentencia->execute();
            $this->contraseña = $nuevaContraseña;
        } catch (PDOException $e) {
            echo "Error al actualizar la contraseña: " . $e->getMessage();
        }
    }

    /**
     * Actualiza el nombre y apellidos del usuario en la base de datos
     *
     * @param string $nuevoNombreApellidos Nuevo nombre y apellidos del usuario
     * @return void
     */
    public function updateNombreApellidos($nuevoNombreApellidos)
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("UPDATE usuario SET nombreapellidos = ? WHERE nombre_usuario = ?");
            $sentencia->bindParam(1, $nuevoNombreApellidos);
            $sentencia->bindParam(2, $this->nombre_usuario);
            $sentencia->execute();
            $this->nombreapellidos = $nuevoNombreApellidos;
        } catch (PDOException $e) {
            echo "Error al actualizar el nombre y apellidos: " . $e->getMessage();
        }
    }

     /**
     * Actualiza la dirección del usuario en la base de datos
     *
     * @param string $nuevaDireccion Nueva dirección del usuario
     * @return void
     */
    public function updateDireccion($nuevaDireccion)
    {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare("UPDATE usuario SET direccion = ? WHERE nombre_usuario = ?");
            $sentencia->bindParam(1, $nuevaDireccion);
            $sentencia->bindParam(2, $this->nombre_usuario);
            $sentencia->execute();
            $this->direccion = $nuevaDireccion;
        } catch (PDOException $e) {
            echo "Error al actualizar la dirección: " . $e->getMessage();
        }
    }
}
