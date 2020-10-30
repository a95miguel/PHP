<?php require_once("includes/conexion.php"); ?>
<?php require_once("includes/funciones.php"); ?>
<?php buscar_pagina_selec(); ?>

<?php include("includes/header.php"); ?>
    <table id="estructura">
        <tr>
            <td id="navegacion">
                 <?php echo navegacion($sel_topico_id, $sel_pagina_id); ?>
            <br />
            <a href="nuevo_topico.php">+Agregar topico nuevo</a>
            </td>
            <td id="pagina">
                <?php if (!is_null($sel_topico_id)) {?>
                    <h2><?php echo $sel_topico_id["nombre_menu"]; ?> </h2>
                <?php } elseif (!is_null($sel_pagina_id)){ ?>
                    <h2><?php echo $sel_pagina_id["nombre_menu"]; ?> </h2>
  		<div class="pagina-contenido">
				<?php echo $sel_pagina_id['Contenido']; ?>
			</div>
			<br />
			<a href="editar_pagina.php?pagina=<?php echo urlencode($sel_pagina_id['id']); ?>">Editar pagina</a>
		<?php } else { // nada seleccionado ?>
			<h2>Seleccione un topico o pagina para editar</h2>
		<?php } ?>
		</td>
	</tr>
    </table>
<?php require("includes/footer.php"); ?>

