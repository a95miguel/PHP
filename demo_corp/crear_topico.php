<?php require_once("includes/conexion.php"); ?>
<?php require_once("includes/funciones.php"); ?>
 
<?php
    
    $errores = array();
    //Validacion de datos del formulario
    $campos_requerios = array('nombre_menu', 'posicion', 'visible');
    foreach($campos_requerios as $campos){
        if(!isset($_POST[$campos]) || empty($_POST[$campos]))
        {
            $errores[] = $campos;
            
        }
    }
    
    $longitud_campos = array('nombre_menu' => 30 );
    foreach($longitud_campos as $campo => $maxLongitud)
    {
	if(strlen(trim(mysql_prep($_POST[$campo]))) > $maxLongitud)
	{
		$errores [] = $campo;
	}
    }



    if(!empty($errores))
    {
        redireccionar("nuevo_topico.php");
        
    }
    
?>

<?php
    
    $nombre_menu = mysql_prep($_POST['nombre_menu']);
    $posicion = mysql_prep($_POST['posicion']);
    $visible = mysql_prep($_POST['visible']);
    
?>

<?php
    
    $query = "INSERT INTO Topico (
            nombre_menu, posicion, visible)
            VALUES ( '{$nombre_menu}', {$posicion}, {$visible}
            )";
    
    if($resultado = mysql_query($query, $conexion))
    {
        //Resultado exitoso
        redireccionar("contenido.php");
        
    }
    else{
        //Resultado erroneo
        echo "<p> Error al procesar la creacion de nuevo topico. </p>";
        echo "<p>" . mysql_error() ."</p>";
        
    }
    

?>

<?php mysql_close($conexion); ?>