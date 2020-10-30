 <?php
				ini_set("default_socket_timeout", 200);
				session_start(); 		 	
				require("conf.php");	
					
				$contr_act=$_POST['contr_act'];	
				$nuev_contr=$_POST['nuev_contr'];
				$rep_contr=$_POST['rep_contr'];
				
				if(empty($response)){
					$arr=array(
					'pws'=>$contr_act,
					'newpws'=>$nuev_contr,
					'token'=>"MjAyY2I5NjJhYzU5MDc1Yjk2NGIwNzE1MmQyMzRiNzA.Y3VlcnZpdG92YWNAZ21haWwuY29t.U6L4uJsH_JS9rxsfYE7Kj2VzqeQsEk1X_HTx0VSxVmw",
					'tabla'=>"contratos",
					'accion'=>"UPWS"
					);
					
					$params = array('Parametro'=>json_encode($arr));
					try {
					$response = $client->ABCGenerico($params);
					$xml = $response->ABCGenericoResult;	
					$data = json_decode($xml);
					var_dump($data);
					
					if ( isset($data)){
					
					}
		} 
		catch(Exception $e) {
		die($e->getMessage());
		}
	}
?>