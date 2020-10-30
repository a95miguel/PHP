<?php
function revisar_campos_requeridos($arreglo_requerido) {
	$campo_errors = array();
	foreach($arreglo_requerido as $nombreCampo) {
		if (!isset($_POST[$nombreCampo]) || (empty($_POST[$nombreCampo]) && $_POST[$nombreCampo] !=0)) { 
			$campo_errors[] = $nombreCampo; 
		}
	}
	return $campo_errors;
}

function revisar_max_longitud_campo($arreglo_longitud_campo) {
	$campo_errors = array();
	foreach($arreglo_longitud_campo as $nombreCampo => $maxlongitud ) {
		if (strlen(trim(mysql_prep($_POST[$nombreCampo]))) > $maxlongitud) { $campo_errors[] = $nombreCampo; }
	}
	return $campo_errors;
}

function mostrar_errores($arreglo_errores) {
	echo "<p class=\"errors\">";
	echo "Por favor revise los siguientes campos:<br />";
	foreach($arreglo_errores as $error) {
		echo " - " . $error . "<br />";
	}
	echo "</p>";
}

?>