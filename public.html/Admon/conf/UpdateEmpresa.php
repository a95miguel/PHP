<?php
		session_start(); 	
		require("conf.php");		
		$id_emp =$_POST["id_em"];
		$id_cont =$_POST["id_con"];
		$ud_emp =$_POST["udp_emp"];
		$ud_raz =$_POST["udp_raz"];
		$ud_dir =$_POST["udp_dir"];
		$ud_cur =$_POST["udp_cur"];
		$ud_rfc =$_POST["udp_rfc"];
		$ud_tel =$_POST["udp_tel"];
		$ud_gir =$_POST["udp_gir"];
		$ud_con =$_POST["udp_contac"];
		$ud_fax =$_POST["udp_fax"];
		$ud_eml =$_POST["udp_em"];
		$ud_web =$_POST["udp_web"];
		$ud_ciu =$_POST["udp_ciudad"];
		$ud_est =$_POST["udp_est"];
		$ud_pai =$_POST["udp_pais"];
		$ud_cod =$_POST["udp_cp"];	
	if(empty($response)){ 
		$arr = array(
		'idempresa'=> $id_emp, 
		'idcontrato' => $id_cont,		
		'nom' => $ud_emp, 
		'razs' => $ud_raz, 
		'dir' => $ud_dir, 
		'rfc' => $ud_rfc, 
		'curp' => $ud_cur, 
		'tel' => $ud_tel, 
		'giro' => $ud_gir, 
		'contac' => $ud_con, 
		'fax' => $ud_fax, 
		'email' =>$ud_eml, 
		'web' => $ud_ciu, 
		'ciu' => $ud_ciu, 
		'edo' => $ud_est, 
		'pais'=> $ud_pai, 
		'cp' => $ud_cod,
		'tabla' => "empresas",
		'accion'=> "UE",
		'logo' => ""
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
					var prueba2 = 'Empresa actualizada';
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
					var prueba2 = 'Empresa no existente';
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