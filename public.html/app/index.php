<?php
		//espera de respueta del webservice	
		ini_set("default_socket_timeout", 200);
		session_start(); 
		require("conf.php");
		$email = $_POST["txtidcontrato"];		
		$password = $_POST["txtcon_pws"];			
		//$_SESSION['session_name'] = $_POST["txtidcontrato"];
		//valiacion de los datos
		if( $email == "" || $password == "" ){
        echo'<script type="text/javascript">
             alert("Verefique sus datos");
             window.location="/public.html/index.html"
             </script>';
		}
		if(empty($response)){ 
		//insercion de los datos al webservice
		$params = array('user'=>$email,'password'=>$password);
		try {
		$response = $client->getAccess($params);
		$xml = $response->getAccessResult;
		$data = json_decode($xml);
		// Recuperando datos
		if ( isset($data)){				
			$a= substr($data->message,0,3);
			if($a == 200){
				 echo "
					<script language='JavaScript'>
					window.location = '/public.html/Admon/index.html';
					</script>";	   					
			}
			if($a == 404){
				 echo "
					<script language='JavaScript'>
					var prueba2 = 'Usuario no existe';
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
			 if($a == 400){
				   echo "
					<script language='JavaScript'>
					var prueba2 = 'Solicitud incorrecta, Vuelva intentar';
					alert(prueba2);						
					history.back();
					</script>";	   
			   }	
			if($a == 403){
				   echo "
					<script language='JavaScript'>
					var prueba2 = 'Usuario no esta activo';
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