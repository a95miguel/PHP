<?php
		$id="7843577576";
		$url ='http://192.168.1.75/WSAdmon.asmx?WSDL';
		$client = new SoapClient($url);
		
		$ab = array(
		'tabla'=>'contratos',
		'idparam'=>'idcontrato',
		'idparam2'=>$id
		);
		
		$params = array('tabla'=>json_encode($ab));
		try {
		$response = $client->MostrarInformacion($params);
		$xml = $response->MostrarInformacionResult;
		$data = json_decode($xml);
		var_dump($data);
		} 
		catch(Exception $e) {
		die($e->getMessage());
		}
?>