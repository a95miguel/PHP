<?php require_once("includes/conexion.php"); ?>
<?php require_once("includes/funciones.php"); ?>
<?php
	// Asegurarse que el id del topico  enviado sea un entero
	if (intval($_GET['pagina']) == 0) {
		redireccionar('contenido.php');
	}
	
	$id = mysql_prep($_GET['pagina']);
	// Asegurarse que la pagina existe (no estrictamente necesario)
	// provee extra seguridad y permite utilizar el 
	// id del topico de la pagina para la redireccion
	if ($pagina = get_pagina_por_id($id)) {
		// LIMIT 1 no es neceasrio pero provee mayor seguridad
		$query = "DELETE FROM paginas WHERE id = {$pagina['id']} LIMIT 1";
		$resultado = mysql_query ($query);
		if (mysql_affected_rows() == 1) {
			// Exitosamente eliminado
			redireccionar("editar_topico.php?topico={$pagina['topico_id']}");
		} else {
			// Falla al eliminar
			echo "<p>Falla al eliminar pagina.</p>";
			echo "<p>" . mysql_error() . "</p>";
			echo "<a href=\"contenido.php\">Retornar a Sitio Principal</a>";
		}
	} else {
		// pagina no existe, no se intento eliminar
		redireccionar('contenido.php');
	}
?>
<?php 
// ya que este archivo no incluye footer.php, necesitamos agregarlo manualmente
mysql_close($db_seleccionada);
?>
