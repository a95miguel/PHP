<?php require_once("includes/conexion.php"); ?>
<?php require_once("includes/funciones.php"); ?>
<?php buscar_pagina_selec(); ?>

<?php include("includes/header.php"); ?>
    <table id="estructura">
        <tr>
            <td id="navegacion">
                <?php echo navegacion($sel_topico_id, $sel_pagina_id); ?>
            </td>
            <td id="pagina">
    		<h2>Agregar Topico</h2>
			<form action="crear_topico.php" method="post">
				<p>Nombre Topico: 
					<input type="text" name="nombre_menu" value="" id="nombre_menu" />
				</p>
				<p>Posicion: 
					<select name="posicion">
                                            <?php
                                                $topico_set = get_todos_topicos();
                                                $contar_topico = mysql_num_rows($topico_set);
                                                for($contar=1;$contar<=$contar_topico+1;$contar++)
                                                {
                                                    echo "<option value=\"{$contar}\">$contar</option>";
                                                    
                                                }
                                            ?>
						
					</select>
				</p>
				<p>Visible: 
					<input type="radio" name="visible" value="0" /> No
					&nbsp;
					<input type="radio" name="visible" value="1" /> Si
				</p>
                                <input type="submit" value="Agregar Topico" />
			</form>
            </td>
        </tr>
    </table>
<?php require("includes/footer.php"); ?>

