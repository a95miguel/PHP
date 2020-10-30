<?php require_once("includes/funciones.php"); ?>
<?php
		// Cuatro pasos para cerrar una session
		// (i.e. logging out)

		// 1. Buscar la session
		session_start();
		
		// 2. Quitar todas las variables de session
		$_SESSION = array();
		
		// 3. Destruir el session cookie
		if(isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-42000, '/');
		}
		
		// 4. Destruir la session
		session_destroy();
		
		redireccionar("login.php?logout=1");
?>