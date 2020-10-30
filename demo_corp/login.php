<?php require_once("includes/session.php"); ?>
<?php require_once("includes/conexion.php"); ?>
<?php require_once("includes/funciones.php"); ?>
<?php
	
	include_once("includes/form_funciones.php");
	
	if (logged_in()) {
		redireccionar("staff.php");
	}

	
	// Iniciar el procesamiento del Formulario
	if (isset($_POST['submit'])) { // Formulario ha sido enviado
		$errores = array();

		// realizar validaciones en el formulario de data
		$campos_requeridos = array('usuario', 'contrasena');
		$errores = array_merge($errores, revisar_campos_requeridos($campos_requeridos, $_POST));

		$campos_con_longitud = array('usuario' => 30, 'contrasena' => 30);
		$errores = array_merge($errores, revisar_max_longitud_campo($campos_con_longitud , $_POST));

		$usuario = trim(mysql_prep($_POST['usuario']));
		$contrasena = trim(mysql_prep($_POST['contrasena']));
		$hashed_contrasena = sha1($contrasena);
		
		if ( empty($errores) ) {
			// Revisar la base de datos para ver si el usuario y la contrasena hashed estan creados.
			$query = "SELECT id, usuario ";
			$query .= "FROM usuarios ";
			$query .= "WHERE usuario = '{$usuario}' ";
			$query .= "AND hashed_contrasena = '{$hashed_contrasena}' ";
			$query .= "LIMIT 1";
			$resultados_set = mysql_query($query);
			confirmar_consulta($resultados_set);
			if (mysql_num_rows($resultados_set) == 1) {
				// usuario/contrasena autenticados
				// y solo 1 encontrado
				$usuario_encontrado = mysql_fetch_array($resultados_set);
				$_SESSION['id'] = $usuario_encontrado['id'];
				$_SESSION['usuario'] = $usuario_encontrado['usuario'];
				
				redireccionar("staff.php");
			} else {
				// usuario/contrasena no fueron encontrados en la base de datos
				$mensaje = "Combinacion Usuario/Contraseña es incorrecta.<br />
					Favor asegurar que la tecla de mayusculas no esta activa e intente nuevamente.";
			}
		} else {
			if (count($errores) == 1) {
				$mensaje = "Hubo 1 error en el formulario.";
			} else {
				$mensaje = "Hubieron " . count($errores) . " errores en el formulario.";
			}
		}
		
	} else { // Formulario no ha sido enviado
		if (isset($_GET['logout']) && $_GET['logout'] == 1) {
			$mensaje = "Usted ha realizado logged out.";
		} 
		$usuario = "";
		$contrasena= "";
	}
?>
<?php include("includes/header.php"); ?>
<table id="estructura">
	<tr>
		<td id="navegacion">
			<a href="index.php">Retornar al sitio publico</a>
		</td>
		<td id="pagina">
			<h2>Staff Login</h2>
			<?php if (!empty($mensaje)) {echo "<p class=\"mensaje\">" . $mensaje . "</p>";} ?>
			<?php if (!empty($errores)) { mostrar_errores($errores); } ?>
			<form action="login.php" method="post">
			<table>
				<tr>
					<td>Usuario:</td>
					<td><input type="text" name="usuario" maxlength="30" value="<?php echo htmlentities($usuario); ?>" /></td>
				</tr>
				<tr>
					<td>Contraseña:</td>
					<td><input type="password" name="contrasena" maxlength="30" value="<?php echo htmlentities($contrasena); ?>" /></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Login" /></td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
</table>
<?php include("includes/footer.php"); ?>