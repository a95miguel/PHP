 <?php
	session_start(); 
	require("conf.php");
	$pws = $_POST["txt_recuperar"];
	if(empty($response)){ 
		//insercion de los datos al webservice
	    $params = array('user'=>$pws);
		try {
		$response = $client->RecuperaPassword($params);
		$xml = $response->RecuperaPasswordResult;
		$data = json_decode($xml);
		if ( isset($data)){
			// Recuperando datos
		   $a= substr($data->message,0,3);
			   if($a == 200){
				echo "
					<script language='JavaScript'>
					var prueba2 = 'Se envio a su correo la nueva contraseña';
					alert(prueba2);
					history.back();					
					</script>";	   
			   }
			   if($a == 404){
				   echo "
					<script language='JavaScript'>
					var prueba2 = 'Usuario no existe ';
					alert(prueba2);
					history.back();						
					</script>";	   
			   }			   
			    if($a == 400){
				   echo "
					<script language='JavaScript'>
					var prueba2 = 'Solicitud incorrecta';
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