<?php require_once("includes/conexion.php"); ?>
<?php require_once("includes/funciones.php"); ?>
<?php
        if (intval($_GET['topico']) == 0) {
                redireccionar("contenido.php");
        }
        if (isset($_POST['submit'])) {
                $errores = array();

                $campos_requeridos = array('nombre_menu', 'posicion', 'visible');
                foreach($campos_requeridos as $campo) {
                        if (!isset($_POST[$campo]) || (empty($_POST[$campo]) && $_POST[$campo] !=0)) { 
                                $errores[] = $campo; 
                        }
                }
                $longitud_campos = array('nombre_menu' => 30);
                foreach($longitud_campos as $campo => $maxLongitud ) {
                        if (strlen(trim(mysql_prep($_POST[$campo]))) > $maxLongitud) { $errores[] = $campo; }
                }
                
               
                if(empty($errores))
                {
                    
                    $id = mysql_prep($_GET['topico']);
                    $nombre_menu = mysql_prep($_POST['nombre_menu']);
                    $posicion = mysql_prep($_POST['posicion']);
                    $visible = mysql_prep($_POST['visible']);                    
                    
                    $query = "UPDATE topico SET
                              nombre_menu = '{$nombre_menu}',
                              posicion = {$posicion},
                              visible = {$visible}
                              WHERE id={$id}";
                              
                    $resultado = mysql_query($query, $conexion);
                    
                    if(mysql_affected_rows() == 1){
                        //Exitosamente procesado los datos
                        $mensaje = "El topico se ha actualizado exitosamente.";
                    }
                    else{
                        //Fallo en procesamiento datos
                        $mensaje = "El topico no pudo ser actualizado correctamente.";
                        $mensaje .= "<br />".mysql_error() ;
                    }
                    
                }
                else{
                    //fallos en el formulario
                    $mensaje = "Hubieron " . count($errores) . " errores en el formulario.";
                }
        } 
?>


<?php buscar_pagina_selec(); ?>

<?php include("includes/header.php"); ?>
    <table id="estructura">
        <tr>
            <td id="navegacion">
                <?php echo navegacion($sel_topico_id, $sel_pagina_id); ?>
            </td>
            <td id="pagina">
    		<h2>Editar Topico: <?php echo $sel_topico_id['nombre_menu']; ?></h2>
                      	<?php if (!empty($mensaje)) {
				echo "<p class=\"mensaje\">" . $mensaje . "</p>";
			} ?>
			<?php
			
			if (!empty($errores)) {
				echo "<p class=\"errores\">";
				echo "Favor revisar los siguientes campos:<br />";
				foreach($errores as $error) {
					echo " - " . $error . "<br />";
				}
				echo "</p>";
			}
			?>
                     	<form action="editar_topico.php?topico=<?php echo urlencode($sel_topico_id['id']); ?>" method="post">
				<p>Nombre Topico: 
				    <input type="text" name="nombre_menu" value="<?php echo $sel_topico_id['nombre_menu']; ?>" id="nombre_menu" />
				</p>
				<p>Posicion: 
					<select name="posicion">
                                            <?php
                                                $topico_set = get_todos_topicos();
                                                $contar_topico = mysql_num_rows($topico_set);
                                                for($contar=1;$contar<=$contar_topico+1;$contar++)
                                                {
                                                    echo "<option value=\"{$contar}\"";
                                                    if($sel_topico_id['posicion'] == $contar){
                                                        echo " selected";
                                                    }
                                                    echo ">{$contar}</option>";
                                                }
                                            ?>
						
					</select>
				</p>
				<p>Visible: 
					<input type="radio" name="visible" value="0"
                                        <?php if($sel_topico_id['visible'] == 0) { echo " checked"; } ?> /> No
					&nbsp;
					<input type="radio" name="visible" value="1"
                                        <?php if($sel_topico_id['visible'] == 1) { echo " checked"; } ?> /> Si
				</p>
				<input type="submit" name="submit" value="Editar Topico" />
                                &nbsp;&nbsp;
                                <a href="borrar_topico.php?topico=<?php echo urlencode($sel_topico_id['id']); ?>" onclick="return confirm('Desea eliminar este registro?');">Borrar Topico</a>
			</form>
                        <br />
                        <a href="contenido.php">Cancelar</a>
            </td>
        </tr>
    </table>
<?php require("includes/footer.php"); ?>

