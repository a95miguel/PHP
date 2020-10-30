<?php require_once("includes/session.php"); ?>
<?php confirmar_logged_in(); ?>
<?php // esta pagina es incluida por  nueva_pagina.php y editar_pagina.php ?>
<?php if (!isset($nueva_pagina)) {$nueva_pagina = false;} ?>

<p>Nombre Pagina: <input type="text" name="nombre_menu" value="<?php echo $sel_pagina_id['nombre_menu']; ?>" id="nombre_menu" /></p>

<p>Posicion: <select name="posicion">
	<?php
		if (!$nueva_pagina) {
			$pagina_set = get_paginas_para_topicos($sel_pagina_id['topico_id']);
			$pagina_contar = mysql_num_rows($pagina_set);
		} else {
			$pagina_set = get_paginas_para_topicos($sel_topico_id['id']);
			$pagina_contar = mysql_num_rows($pagina_set) + 1;
		}
		for ($contar=1; $contar <= $pagina_contar; $contar++) {
			echo "<option value=\"{$contar}\"";
			if ($sel_pagina_id['posicion'] == $contar) { echo " selected"; }
			echo ">{$contar}</option>";
		}
	?>
</select></p>
<p>Visible: 
	<input type="radio" name="visible" value="0"<?php 
	if ($sel_pagina_id['visible'] == 0) { echo " checked"; } 
	?> /> No
	&nbsp;
	<input type="radio" name="visible" value="1"<?php 
	if ($sel_pagina_id['visible'] == 1) { echo " checked"; } 
	?> /> Si
</p>
<p>Contenido:<br />
	<textarea name="Contenido" rows="20" cols="80"><?php echo $sel_pagina_id['Contenido']; ?></textarea>
</p>