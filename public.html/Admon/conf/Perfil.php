<?php   
	ini_set("default_socket_timeout", 200);
	session_start(); 	
	require("conf.php");		
	$desc = $_POST["desc"];
	$id= $_POST["id_cont"];		
	if(empty($response)){ 
		$arr = array(
		'descr' => $desc,
		'idcontrato' => $id,		
		'tabla' => "perfiles",
		'accion'=> "IP"
		);
		$params = array('Parametro'=>json_encode($arr));	
		try {
		$response = $client->ABCGenerico($params);
		$xml = $response->ABCGenericoResult;	
		$data = json_decode($xml);
		// Recuperando datos
		if ( isset($data)){
		$a= substr($data->message,0,3);
		}
		} 
		catch(Exception $e) {
		die($e->getMessage());
		}
	}
 ?>