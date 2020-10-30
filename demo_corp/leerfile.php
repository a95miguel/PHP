<?php
    
    $file = fopen("data.txt","r") or
    die("No se pudo abrir el archivo");
    
    while (!feof($file))
    {
        $lectura = fgets($file);
        $saltos = nl2br($lectura);
        echo $saltos;
    
    }
    
    fclose($file);
    
?>