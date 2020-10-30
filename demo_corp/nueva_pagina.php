<?php require_once("includes/conexion.php"); ?>
<?php require_once("includes/funciones.php"); ?>
<?php
	// asegurarnos que el id del topico enviado sea un entero
	if (intval($_GET['topico']) == 0) {
		redireccionar('contenido.php');
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
		
		// depurar la data del formulario antes de guardarlo en la base de datos
		$topico_id = mysql_prep($_GET['topico']);
		$nombre_menu = trim(mysql_prep($_POST['nombre_menu']));
		$posicion = mysql_prep($_POST['posicion']);
		$visible = mysql_prep($_POST['visible']);
		$contenido = mysql_prep($_POST['Contenido']);
	
		// El submit de la bae de datos solo procede si no hubo errores
		if (empty($errores)) {
			$query = "INSERT INTO paginas (
						nombre_menu, posicion, visible, Contenido, topico_id
					) VALUES (
						'{$nombre_menu}', {$posicion}, {$visible}, '{$contenido}', {$topico_id}
					)";
			if ($resultados = mysql_query($query, $conexion)) {
				
				$mensaje = "La pagina fue creada exitosamente.";
				// capturar el ultimo id insertado sobre la actual conexion a la bd
				$nueva_pagina_id = mysql_insert_id();
				redireccionar("contenido.php?pagina={$nueva_pagina_id}");
			} else {
				$mensaje = "La pagina no pudo ser creada.";
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
			<?php echo navegacion($sel_topico_id, $sel_pagina_id, $publico = false); ?>
			<br />
			<a href="nuevo_topico.php">+ Agregar un nuevo topico</a>
		</td>
		<td id="pagina">
			<h2>Agregar Nueva Pagina</h2>
			<?php if (!empty($mensaje)) {echo "<p class=\"mensaje\">" . $mensaje . "</p>";} ?>
			<?php if (!empty($errores)) { mostrar_errores($errores); } ?>
			
			<form action="nueva_pagina.php?topico=<?php echo $sel_topico_id['id']; ?>" method="post">
				<?php $nueva_pagina = true; ?>
				<?php include "form_pagina.php" ?>
				<input type="submit" name="submit" value="Crear Pagina" />
			</form>
			<br />
			<a href="editar_topico.php?topico=<?php echo $sel_topico_id['id']; ?>">Cancelar</a><br />
		</td>
	</tr>
</table>
<?php include("includes/footer.php"); ?>