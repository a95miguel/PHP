<?php			
		ini_set("default_socket_timeout", 200);
		session_start(); 
		require("conf.php");
		$con_nomemp = $_POST["txt_empresa"];
		$con_email = $_POST["txt_email"];
		$con_pws = $_POST["txt_pws"];
		$con_pwsrep = $_POST["txt_pwsrep"];
		$con_tpo = $_POST["txt_emp"];
		$con_nom = $_POST["txt_nombre"];
		$con_apep = $_POST["txt_apep"];
		$con_apem = $_POST["txt_apem"];
		if(empty($response)){ 
						$arr = array(
									'nomemp' => $con_nomemp,
									'tpo'=>$con_tpo,
									'nom'=>$con_nom,
									'apep'=>$con_apep,
									'apem'=>$con_apem,
									'email'=> $con_email, 
									'psw' => $con_pws,
									'tabla' => "contratos",
									'accion'=> "IC"
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
								var prueba2 = 'Solicitud incorrecta ';
								alert(prueba2);
								history.back();					
								</script>";	   
							}							
							if($a == 401){
								 echo "
								<script language='JavaScript'>
								var prueba2 = 'Faltan datos ';
								alert(prueba2);
								history.back();					
								</script>";	   
							}							
							if($a==409){
								echo "
								<script language='JavaScript'>
								var prueba2 = 'Usuario ya existe ';
								alert(prueba2);
								history.back();					
								</script>";	
							}							
							if($a == 201){
								echo"bienvenido se le envio a su correo: $con_email un link para activar su contrato";
							}
											
							 							   
							}
							} 
							catch(Exception $e) {
								die($e->getMessage());
							}		
		}
?>