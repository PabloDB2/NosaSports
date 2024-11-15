<style>
    body {
        margin: 0;
        display: flex;
        flex-direction: column;
    }

    nav {
        background-color: rgb(104, 86, 52);
        color: white;
        width: 100vw;
        max-width: 100%;
        height: 60px;
        margin-top: 70px;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        z-index: 1;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    a {
        text-decoration: none;
        color: white;
        display: flex; 
        align-items: center;
        justify-content: flex-start;
        margin-right: 15px;
        margin-left: 10px;
        font-size: 22px;
    }

    a:hover {
        text-decoration: none;
        color: black;
    }

    .logo {
        width: 200px;
        height: 200px;
        position: absolute;
        z-index: 10;
        top: 0px;
    }

    .opcionesUsuario {
        position: absolute;
        top: 10px;
        right: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
        z-index: 10;
    }

    .opcionesUsuario a,
    .opcionesUsuario button {
        text-decoration: none;
        color: rgb(104, 86, 52);
        font-size: 20px;
        background: none;
        border: none;
        cursor: pointer;
    }

    .opcionesUsuario button:hover,
    .opcionesUsuario a:hover {
        color: black;
    }

    .opcionesUsuario img {
        width: 20px;
        height: 20px;
    }

    @media (max-width: 480px) {
        nav {
            height: 40px;
            font-size: 18px;
        }
    }
</style>

<body>
    <!-- Opciones de usuario -->
    <div class="opcionesUsuario">
        <?php
        if ($nombre_usuario) {
            echo '<a href="cuenta.php"><img src="../Img/icons8-usuario-masculino-en-círculo-60.png" alt="Usuario" style="width: 40px; height: 40px; margin-right: 8px;">' . htmlspecialchars($nombre_usuario) . '</a>';

            if ($nombre_usuario === "admin") {
        ?>
                <a href="opcionesAdmin.php"><img src="../Img/icons8-llave-50.png" alt="Admin" style="width: 25px; height: 25px; margin-right: 8px;">Opciones de admin</a>
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
        <a href="../PHP/inicio.php">
            <img src="../Img/icons8-casa-50.png" alt="Inicio" style="width: 24px; height: 24px; margin-right: 8px;">
            Inicio
        </a>
        <a href="../PHP/seleccion.php">
            <img src="../Img/icons8-producto-50.png" alt="Productos" style="width: 24px; height: 24px; margin-right: 8px;">
            Productos
        </a>
        <a href="../PHP/paginaWishlist.php">
            <img src="../Img/icons8-estrella-50.png" alt="Deseados" style="width: 24px; height: 24px; margin-right: 8px;">
            Deseados
        </a>
        <a href="../PHP/contacto.php">
            <img src="../Img/icons8-teléfono-50.png" alt="Contactanos" style="width: 24px; height: 24px; margin-right: 8px;">
            Contactanos
        </a>
    </nav>

    <img class="logo" src="/NosaSports/Codigo/app/view/Img/logo.png" alt="">
</body>
