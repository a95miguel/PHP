 <?php   
	session_start(); 		 		
	require("conf.php");
	$nom = $_POST["udp_name"];
	$usu = $_POST["udp_usuario"];
	$pws = $_POST["udp_contrasena"];
	$pto = $_POST["udp_pue"];
	$dep = $_POST["udp_depa"];
	$mail = $_POST["udp_email"];
	$tel = $_POST["udp_tel"];
	$id_usu = $_POST["id_usuario"];
	$idcontrato = $_POST["udp_cont"];
	if(empty($response)){ 
		$arr = array(
		'idusuario'=>$id_usu,
		'idcontrato'=>$idcontrato,		
		'nom'=>$nom,
		'usu'=>$usu,
		'pws'=>$pws,
		'pto'=>$pto,
		'depto'=>$dep,
		'email'=>$mail,
		'tel'=>$tel,		
		'tabla' => "usuarios",
		'accion'=> "UU"
		);
		$params = array('Parametro'=>json_encode($arr));
		try {
		$response = $client->ABCGenerico($params);
		$xml = $response->ABCGenericoResult;	
		$data = json_decode($xml);
		if ( isset($data)){
		a= substr($data->message,0,3);
		
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
					var prueba2 = 'Usuario actualizado';
					window.location = '/public.html/Admon/index.html';
					alert(prueba2);					
					</script>";	  
		}
	
		if($a == 404){
			echo "
					<script language='JavaScript'>
					var prueba2 = 'Usuario no existente';
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