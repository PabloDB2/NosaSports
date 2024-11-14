<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    
</head>
<style>
body{
    margin: 0;
    display: flex;
    flex-direction: column;
}
nav{

background-color: rgb(104,86,52);
color: white;
width: 100vw;
max-width: 100%;
height: 60px;
margin-top:70px;
display: flex;
justify-content: flex-end; 
align-items: center; 
/*Si el z-index es menor que el de la imagen va a estar por debajo*/
z-index: 1;  

/*Añado una linea de sombra en el nav*/
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);

}  
a{
    text-decoration: none;
    color: white;
    margin-right: 15px;
    margin-left:10px;
    font-size: 22px;
}

a:hover{
    text-decoration: none;
    color: black;
    margin-right: 15px;
    margin-left:10px;
    font-size: 22px;
    
}

.logo{
    width: 200px;
    height: 200px;
    position: absolute;
    z-index: 10;
    top:0px;
}

.opcionesUsuario {
        position: absolute;
        top: 10px;
        right: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
        z-index: 10; /* Asegura que esté por encima del nav */
    }

    .opcionesUsuario a,
    .opcionesUsuario button {
        text-decoration: none;
        color: rgb(104, 86, 52);
        font-size: 18px;
        background: none;
        border: none;
        cursor: pointer;
    }

    .opcionesUsuario button:hover,
    .opcionesUsuario a:hover {
        color: black;
    }

@media (max-width: 480px) {
nav {
    height: 40px; /* Reduce la altura del navbar */
    font-size: 18px;
}

}
</style>
<body>
    <!-- Opciones de usuario -->
<div class="opcionesUsuario">
    <?php 
    if ($nombre_usuario) { 
        echo '<a href="cuenta.php">' . htmlspecialchars($nombre_usuario) . '</a>';
 
        if ($nombre_usuario === "admin") { 
        ?>
            <a href="opcionesAdmin.php">Opciones de admin</a>
        <?php 
        } 
    } else { 
        ?>
        <a href="login.php">Iniciar sesión</a>
    <?php 
    } 
    ?>
</div>
    
    <nav>
        <a href="../PHP/inicio.php">Inicio</a>
        <a href="../PHP/seleccion.php">Productos</a>
        <a href="../PHP/favoritos.php">Deseados</a>
        <a href="../PHP/contacto.php">Contactanos</a>  
    </nav>

    <img class="logo" src="/NosaSports/Codigo/app/view/Img/logo.png" alt="">


</nav>
</body>
</html>