<?php require_once("includes/conexion.php"); ?>
<?php require_once("includes/funciones.php"); ?>
<?php
	include_once("includes/form_funciones.php");
	
	// Iniciar procesamiento de formulario
	if (isset($_POST['submit'])) { // Formulario ha sido procesado.
		$errores = array();

		// realizar validaciones en los datos del formulario
		$campos_requeridos = array('usuario', 'contrasena');
		$errores = array_merge($errores, revisar_campos_requeridos($campos_requeridos, $_POST));

		$campos_con_longitud = array('usuario' => 30, 'contrasena' => 30);
		$errores = array_merge($errores, revisar_max_longitud_campo($campos_con_longitud, $_POST));

		$usuario = trim(mysql_prep($_POST['usuario']));
		$contrasena = trim(mysql_prep($_POST['contrasena']));
		$hashed_contrasena = sha1($contrasena);

		if ( empty($errores) ) {
			$query = "INSERT INTO usuarios (
							usuario, hashed_contrasena
						) VALUES (
							'{$usuario}', '{$hashed_contrasena}'
						)";
			$resultado = mysql_query($query, $conexion);
			if ($resultado) {
				$mensaje = "El usuario ha sido creado exitosamente.";
			} else {
				$mensaje = "El usuario no pudo ser creado.";
				$mensaje .= "<br />" . mysql_error();
			}
		} else {
			if (count($errores) == 1) {
				$mensaje = "Hubo un error en el formulario.";
			} else {
				$mensaje = "Hubieron " . count($errores) . " errores en el formulario.";
			}
		}
	} else { // Formulario no ha sido procesado
		$usuario = "";
		$contrasena = "";
	}
?>
<?php include("includes/header.php"); ?>
<table id="estructura">
	<tr>
		<td id="navegacion">
			<a href="staff.php">Retornar al Menu</a><br />
			<br />
		</td>
		<td id="pagina">
			<h2>Crear Nuevo Usuario</h2>
			<?php if (!empty($mensaje)) {echo "<p class=\"mensaje\">" . $mensaje . "</p>";} ?>
			<?php if (!empty($errores)) { mostrar_errores($errores); } ?>
			<form action="nuevo_usuario.php" method="post">
			<table>
				<tr>
					<td>Usuario:</td>
					<td><input type="text" name="usuario" maxlength="30" value="<?php echo htmlentities($usuario); ?>" /></td>
				</tr>
				<tr>
					<td>Contrase�a:</td>
					<td><input type="password" name="contrasena" maxlength="30" value="<?php echo htmlentities($hashed_contrasena); ?>" /></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Crear Usuario" /></td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
</table>
<?php include("includes/footer.php"); ?>