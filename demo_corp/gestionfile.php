<? php

    if(isset($_POST['Enviar'])){

    
        echo "Los datos han sido almacenados exitosamente";
     
    
    }
?>
    
    <html>
    <head>
    <title> Gestion de Archivos en PHP</title>
    </head>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            Nombre   : <input type="text" name="nombre" /> <br>
            Direccion:<input type="text" name="direccion" /> <br>
            Nota     : <textarea name="nota" cols="40" rows="10"></textarea><br>
            <input type="submit" name="Enviar" value="enviar" title="enviar" />
        </form>
    </html>