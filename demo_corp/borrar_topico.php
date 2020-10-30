<?php require_once("includes/conexion.php"); ?>
<?php require_once("includes/funciones.php"); ?>
<?php

        if (intval($_GET['topico']) == 0) {
                redireccionar("contenido.php");
        }
        
              $id = mysql_prep($_GET['topico']);
             
             if($topico = get_topico_por_id($id))
             {
                $query = "DELETE FROM topico WHERE id={$id} LIMIT 1";
                $resultado = mysql_query($query, $conexion);
                if(mysql_affected_rows() == 1)
                {
                      redireccionar("contenido.php");
                  
                }
                else
                {
                      echo "<p> No se pudo eliminar el registro </p>";
                      echo "<p>".mysql_error()."</p>";
                      echo "<a href=\"contenido.php\">Regresar a pagina principal</a>";
                  
                }
                
             }
             else
             {
                //Si el registro no existe redireccionar a contenido.php
                redireccionar("contenido.php");
                
             }
              
?>


<?php require("includes/footer.php"); ?>