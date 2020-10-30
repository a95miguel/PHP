 <?php   
	session_start(); 	
	require("conf.php");
	$idempresa = $_POST["idempresa"];
	$idcontrato = $_POST["idcontrato"];	
	$nom = $_POST["nom"];
	$razs = $_POST["razs"];
	$dir = $_POST["dir"];
	$tel = $_POST["tel"];
	$fax = $_POST["fax"];
	$email = $_POST["email"];
	$ciu = $_POST["ciu"];
	$edo = $_POST["edo"];
	$cp = $_POST["cp"];
	$contac= $_POST["contac"];		
	if(empty($response)){   					
		$arr = array(
		'idempresa' =>$idempresa,
		'idcontrato' =>$idcontrato,
		'nom' =>$nom,
		'razs'=>$razs,
		'dir' =>$dir,
		'tel' =>$tel,
		'fax' =>$fax,
		'email' =>$email,
		'ciu' =>$ciu,
		'edo' =>$edo,		
		'cp' =>$cp,
		'contac' => $contac,
		'tabla' => "sucursales",
		'accion'=> "IS"
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
		if($a == 201){
			echo "
					<script language='JavaScript'>
					var prueba2 = 'Sucursal creada';
					window.location = '/public.html/Admon/index.html';
					alert(prueba2);					
					</script>";	  
		}
		if($a == 409){
			echo "
					<script language='JavaScript'>
					var prueba2 = 'Sucursal ya existente';
					alert(prueba2);					
					</script>";	  
		}
		}
		} 
		catch(Exception $e) {
		die($e->getMessage());
		}
	}		
 ?>