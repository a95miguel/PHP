<?php require_once("includes/conexion.php"); ?>
<?php require_once("includes/funciones.php"); ?>
<?php
	// Asegurarse que el id del topico  enviado sea un entero
	if (intval($_GET['pagina']) == 0) {
		redirect_to('contenido.php');
	}

	include_once("includes/form_funciones.php");

	// Iniciar procesamiento del formulario
	// solo ejecutar el procesamiento del formulario, si el formulario ha sido enviado
	if (isset($_POST['submit'])) {
		// inicializar un arreglo para almacenar nuestros errores
		$errores = array();
	
		// realizar validaciones en la data del formulario
		$campos_requeridos = array('nombre_menu', 'posicion', 'visible', 'Contenido');
		$errores = array_merge($errores, revisar_campos_requeridos($campos_requeridos));
		
		$campos_con_longitud = array('nombre_menu' => 30);
		$errores = array_merge($errores, revisar_max_longitud_campo($campos_con_longitud));
		
		// depuarar la data del formulario antes de guardarlo en la base de datos
		$id = mysql_prep($_GET['pagina']);
		$nombre_menu = trim(mysql_prep($_POST['nombre_menu']));
		$posicion = mysql_prep($_POST['posicion']);
		$visible = mysql_prep($_POST['visible']);
		$contenido = mysql_prep($_POST['Contenido']);
	
		// Database submission only proceeds if there were NO errors.
		if (empty($errores)) {
			$query = 	"UPDATE paginas SET 
							nombre_menu = '{$nombre_menu}',
							posicion = {$posicion}, 
							visible = {$visible},
							Contenido = '{$contenido}'
						WHERE id = {$id}";
			$resultado = mysql_query($query);
			// probar si el update ocurrio
			if (mysql_affected_rows() == 1) {
				// Exitoso
				$mensaje = "La pagina fue actualizada exitosamente.";
			} else {
				$mensaje = "La pagina no pudo ser actualizada.";
				$mensaje .= "<br />" . mysql_error();
			}
		} else {
			if (count($errores) == 1) {
				$mensaje = "Hubo un error en el formulario.";
			} else {
				$mensaje = "Hubieron " . count($errores) . " errores en el formulario.";
			}
		}
		// Fin procesamiento del formulario
	}
?>
<?php buscar_pagina_selec(); ?>
<?php include("includes/header.php"); ?>
<table id="estructura">
	<tr>
		<td id="navegacion">
			<?php echo navegacion($sel_topico_id, $sel_pagina_id); ?>
			<br />
			<a href="nuevo_topico.php">+ Agregar un nuevo topico</a>
		</td>
		<td id="pagina">
			<h2>Editar pagina: <?php echo $sel_pagina_id['nombre_menu']; ?></h2>
			<?php if (!empty($mensaje)) {echo "<p class=\"mensaje\">" . $mensaje . "</p>";} ?>
			<?php if (!empty($errores)) { mostrar_errores($errores); } ?>
			
			<form action="editar_pagina.php?pagina=<?php echo $sel_pagina_id['id']; ?>" method="post">
				<?php include "form_pagina.php" ?>
				<input type="submit" name="submit" value="Actualizar Pagina" />&nbsp;&nbsp;
				<a href="borrar_pagina.php?pagina=<?php echo $sel_pagina_id['id']; ?>" onclick="return confirm('Esta seguro que desea borrar esta pagina?');">Borrar Paginas</a>
			</form>
			<br />
			<a href="contenido.php?pagina=<?php echo $sel_pagina_id['id']; ?>">Cancelar</a><br />
		</td>
	</tr>
</table>
<?php include("includes/footer.php"); ?>