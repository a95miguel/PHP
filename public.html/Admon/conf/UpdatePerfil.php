<?php   
	session_start(); 		 	
	require("conf.php");	
	$per = $_POST["id_perfil"];
	$des = $_POST["des_perfil"];
	$con = $_POST["id_contrato"];
	if(empty($response)){ 
		$arr = array(
		'idperfil'=> $per,
		'descr'=> $des,
		'idcontrato'=> $con,
		'tabla' => "perfiles",
		'accion'=> "UP"
		);
		$params = array('Parametro'=>json_encode($arr));			
		try {
		$response = $client->ABCGenerico($params);
		$xml = $response->ABCGenericoResult;	
		$data = json_decode($xml);
		if ( isset($data)){
		$a= substr($data->message,0,3);
		if($a == 400){
			echo "
					<script language='JavaScript'>
					var prueba2 = 'Solicitud incorrecta';
					alert(prueba2);
					history.back();	
					</script>";	  
		}
		if($a == 401){
			echo "
					<script language='JavaScript'>
					var prueba2 = 'Faltan datos';
					alert(prueba2);
					history.back();	
					</script>";	  
		}
		if($a == 200){
			echo "
					<script language='JavaScript'>
					var prueba2 = 'Perfil actualizado';
					window.location = '/public.html/Admon/index.html';
					alert(prueba2);					
					</script>";	  
		}
		if($a == 404){
			echo "
					<script language='JavaScript'>
					var prueba2 = 'Perfil no existente';
					alert(prueba2);		
					history.back();	
					</script>";	  
		}		
		}
		} 
		catch(Exception $e) {
		die($e->getMessage());
		}
	}	
 ?>