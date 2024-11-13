<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/contacto.css">
</head>
<body>
    
    <?php include "../Generales/nav.html" ?>
    <div class="content">

    
        <form action="contacto.php" method="POST">
            
            <div class="textos">
                <h1>REDACTE SUS CONSULTAS:</h1>
                <textarea class="texto1" maxlength="50" name="texto1" placeholder="Introduzca su correo electronico..."></textarea>
                <textarea class="texto2" maxlength="204" name="texto2" placeholder="Introduzca el texto..."></textarea>
                <input class= "boton" type="submit" value="ENVIAR">
            </div>
            
        </form>

        <div class="content2">
            <p>📍 RÚA MONASTEIRO DE CAAVEIRO, 1, 15010, A CORUÑA</p>
            <p>✉ NOSASPORTS@STORE.COM</p>
            <p>📞 654475315</p>
        </div>
        

    </div>

    
    

    

</body>

    <?php include "../Generales/footer.php" ?>
    
</html>
