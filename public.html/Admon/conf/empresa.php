 <?php   
	session_start(); 
	require("conf.php");	
	//$a=$_SESSION['idcontrato'];
	$idcontrato = $_POST["txtidcontrato"];
	$emp = $_POST["txt_emp"];
	$raz = $_POST["txt_razon"];
	$dir = $_POST["txt_dir"];
	$curp = $_POST["txt_curp"];
	$rfc = $_POST["txt_rfc"];
	$tel = $_POST["txt_tel"];
	$giro = $_POST["txt_giro"];
	$cont= $_POST["txt_cont"];
	$fax = $_POST["txt_fax"];
	$em = $_POST["txt_em"];
	$web = $_POST["txt_web"];
	$ciu = $_POST["txt_ciudad"];
	$est = $_POST["txt_est"];
	$pais = $_POST["txt_pais"];
	$cp = $_POST["txt_cp"];
	
	if(empty($response)){ 
		$arr = array(
		'idcontrato' => $idcontrato,
		'nom' => $emp, 
		'razs' => $raz, 
		'dir' => $dir, 
		'rfc' => $curp, 
		'curp' => $rfc, 
		'tel' => $tel, 
		'giro' => $giro, 
		'contac' => $cont, 
		'fax' => $fax, 
		'email' =>$em, 
		'web' => $web, 
		'ciu' => $ciu, 
		'edo' => $est, 
		'pais'=> $pais, 
		'cp' => $cp,
		'tabla' => "empresas",
		'accion'=> "IE",
		'logo' => "AAA"
		);	
		$params = array('Parametro'=>json_encode($arr));	
		try {
		$response = $client->ABCGenerico($params);
		$xml = $response->ABCGenericoResult;
		$data = json_decode($xml);
		var_dump($data);
		// Recuperando datos
		if ( isset($data)){
		$a= substr($data->message,0,3);
		if($a == 400){
		echo "
		<script language='JavaScript'>
		alert('Solicitud incorrecta');		
		history.back(); 
		</script>";		
		}
		if($a == 401){
			echo "
		<script language='JavaScript'>
		alert('Faltan datos');		
		history.back(); 
		</script>";				
		}
		if($a == 404){
			echo "
		<script language='JavaScript'>
		alert('Contrato no existe');		
		history.back(); 
		</script>";				
		}
		if($a == 201){
			echo "
		<script language='JavaScript'>
		alert('Empresa creada');		
		history.back(); 
		</script>";				
		}
		if($a == 409){
			echo "
		<script language='JavaScript'>
		alert('Empresa ya existente');		
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