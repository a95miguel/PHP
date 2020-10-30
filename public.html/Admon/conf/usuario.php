<?php
	ini_set("default_socket_timeout", 200);
	session_start(); 	
	require("conf.php");		
	$nom = $_POST["usu_nom"];
	$usu = $_POST["usu_usu"];
	$pws = $_POST["usu_pws"];
	$rep_cont = $_POST["usu_rep"];
	$pto = $_POST["usu_pto"];
	$dep = $_POST["usu_dep"];
	$mail = $_POST["usu_email"];
	$tel = $_POST["usu_tel"];
	$id = $_POST["id"];
		//cargar la imagen
	$archivo = (isset($_FILES['archivo'])) ? $_FILES['archivo'] : null;
   if ($archivo) {
      $ruta_destino_archivo = "foto_usuarios/{$archivo['name']}";
      $archivo_ok = move_uploaded_file($archivo['tmp_name'], $ruta_destino_archivo);
	  echo $ruta_destino_archivo;
	  echo "</br>";
 }
	if(empty($response)){ 	
		$arr = array(
		'nom'=>$nom,
		'usu'=>$usu,
		'pws'=>$pws,
		'pto'=>$pto,
		'depto'=>$dep,
		'email'=>$mail,
		'tel'=>$tel,
		'foto'=>$ruta_destino_archivo,
		'idcontrato'=>$id,
		'tabla' => "usuarios",
		'accion'=> "IU"
		);
		$params = array('Parametro'=>json_encode($arr));	
		var_dump($params);
		try {
		$response = $client->ABCGenerico($params);
		$xml = $response->ABCGenericoResult;	
		$data = json_decode($xml);	
		/*
		if ( isset($data)){
		$a= substr($data->message,0,3);
		if($a == 400){
		echo "
		<script language='JavaScript'>
		alert('Solicitud incorrecta');		
		return false;
		</script>";			
		}
		if($a == 401){
			echo "
		<script language='JavaScript'>
		alert('Faltan datos');		
		history.back(); 
		</script>";				
		}
		if($a == 201){
			echo "
		<script language='JavaScript'>
		alert('Usuario creado');		
		history.back(); 
		</script>";				
		}
		if($a == 409){
		echo "
		<script language='JavaScript'>
		alert('Usuario ya existente');		
		history.back(); 
		</script>";				
		}
		}*/
		} 
		catch(Exception $e) {
		die($e->getMessage());
		}
	}
 ?>