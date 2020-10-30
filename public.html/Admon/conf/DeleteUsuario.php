  <?php   
	ini_set("default_socket_timeout", 200);
	session_start(); 		 		
	require("conf.php");
	$idcont = $_POST["delete_id"];
	$idusu = $_POST["delete_usu"];
	
	if(empty($response)){ 
		//$url ='http://172.16.0.105/WSAdmon.asmx?WSDL';
		//$client = new SoapClient($url);
		$arr = array(
		'nom'=>$idcont,
		'usu'=>$idusu,
		'tabla' => "usuario",
		'accion'=> "DU"
		);
		
		$params = array('Parametro'=>json_encode($arr));	
		var_dump($params);
		try {
		$response = $client->ABCGenerico($params);
		$xml = $response->ABCGenericoResult;	
		$data = json_decode($xml);
		
		// Recuperando datos
		if ( isset($data)){
		var_dump($data);
		$a= substr($data->message,0,3);
		echo $a;
		/*
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
		
		if($a == 201){
			echo "
					<script language='JavaScript'>
					var prueba2 = 'Usuario creado';
					window.location = '/public.html/Admon/index.html';
					alert(prueba2);					
					</script>";	  
		}
		
		if($a == 409){
			echo "
					<script language='JavaScript'>
					var prueba2 = 'Usuario ya existente';
					alert(prueba2);		
					history.back();	
					</script>";	  
		}
		if($a == 404){
			echo "
					<script language='JavaScript'>
					var prueba2 = 'Empresa no existente';
					alert(prueba2);		
					history.back();	
					</script>";	  
		}
		
		*/		
		}
		} 
		catch(Exception $e) {
		die($e->getMessage());
		}
	}	
 ?>