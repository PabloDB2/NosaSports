<?php
require_once(__DIR__ . '/../../rutas.php');
require_once(CONFIG . 'dbConnection.php'); // ruta de config definido en rutas.php

class Usuario
{
    private $nombre_usuario;
    private $correo;
    private $nombreapellidos; // nombre y apellidos van juntos
    private $direccion ;
    private $contraseña;
    
    public function getNombreUsuario()
    {
        return $this->nombre_usuario;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getNombreApellidos()
    {
        return $this->nombreapellidos;
    }

    public function getContraseña()
    {
        return $this->contraseña;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setNombreUsuario($nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function setNombreApellidos($nombreapellidos)
    {
        $this->nombreapellidos = $nombreapellidos;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;
    }

    public static function getAllUsers()
    {
        try {
            $conn = getDBConnection();
            $query = $conn->query("SELECT * FROM usuario");
            $result = $query->fetchAll(PDO::FETCH_ASSOC); // El assoc devuelve cada fila como array asociativo
            return $result;
        } catch (PDOException $e) {
            echo "Error al ejecutar la query";
        }
    }

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
}
?>
