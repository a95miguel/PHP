<?php
		session_start(); 	
		require("conf.php");
		$ud_nom =$_POST["udp_nom"];
		$ud_raz =$_POST["udp_raz"];
		$ud_dir =$_POST["udp_dir"];
		$ud_tel =$_POST["udp_tel"];
		$ud_fax =$_POST["udp_fax"];
		$ud_eml =$_POST["udp_eml"];
		$ud_ciu =$_POST["udp_ciu"];
		$ud_est =$_POST["udp_est"];
		$ud_cod =$_POST["udp_cod"];
		$ud_cot =$_POST["udp_cot"];
		$id_suc =$_POST["id_sucursal"];
		$id_emp =$_POST["id_emp"];
	
	if(empty($response)){ 
		$arr = array(
		'idsucursal'=> $id_suc,
		'idempresa'=> $id_emp,
		'idcontrato'=>"",
		'nom'=> $ud_nom,
		'razs'=> $ud_raz, 
		'dir'=> $ud_dir, 
		'tel'=> $ud_tel, 
		'fax'=> $ud_fax,
		'email'=> $ud_eml,
		'ciu'=> $ud_ciu,
		'edo'=> $ud_est,
		'cp'=> $ud_cod,
		'contac'=> $ud_cot,				
		'tabla' => "sucursales",
		'accion'=> "US"
		);	
		$params = array('Parametro'=>json_encode($arr));				
		try {			
		$response = $client->ABCGenerico($params);
		$xml = $response->ABCGenericoResult;
		$data = json_decode($xml);
		// Recuperando datos
		if ( isset($data)){		
		$a= substr($data->message,0,3);		
		if($a == 200){
			echo "
					<script language='JavaScript'>
					var prueba2 = 'Sucursal actualizada';
					window.location = '/public.html/Admon/index.html';
					alert(prueba2);					
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
		if($a == 404){
			echo "
					<script language='JavaScript'>
					var prueba2 = 'Sucursal no existente';
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