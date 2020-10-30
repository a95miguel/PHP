</br>
</br>
<div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-user fa-fw" ></i> Mi perfil
                </div>
                    <table class="table table-bordered" >
                      <tbody>
                      
                        <tr>						
                        <td>
						Nombre de la empresa
                        </td>						
                        <td class="text-primary">
			<?php		
				$id="7843577576";
				//Direccion  del webserver
				$url ='http://192.168.1.75/WSAdmon.asmx?WSDL';
				$client = new SoapClient($url);
				//Parametros que se le envia al webserver para mostrar informacion
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
				
				$array = json_decode($data,true);
				//mostrar dato 
				echo $array['contratos'][0]['con_nomemp'];																	
				} 
				catch(Exception $e) {
				die($e->getMessage());
				}	
				?>		
                        </td>
                        </tr>
						
						<tr>						
                        <td>
						Nombre
                        </td>						
                        <td class="text-primary">
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
						$array = json_decode($data,true);
						echo $array['contratos'][0]['con_nom'];																			
						$nombre=$array;
						} 
						catch(Exception $e) {
						die($e->getMessage());
						}
						?>
                        </td>
                        </tr>
						
						<tr>						
                        <td>
						Apellido paterno						
                        </td>						
                        <td class="text-primary">
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
						
						$array = json_decode($data,true);
						echo $array['contratos'][0]['con_apep'];									
										
						} 
						catch(Exception $e) {
						die($e->getMessage());
						}
						?>						
                        </td>
                        </tr>
						
						<tr>						
                        <td>
						Apellido materno
                        </td>						
                        <td class="text-primary">
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
						
						$array = json_decode($data,true);
						echo $array['contratos'][0]['con_apem'];									
										
						} 
						catch(Exception $e) {
						die($e->getMessage());
						}
						?>
                        </td>
                        </tr>
						
						<tr>						
                        <td >
						Email
                        </td>						
                        <td class="text-primary">
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
						$array = json_decode($data,true);
						echo $array['contratos'][0]['con_email'];										
						} 
						catch(Exception $e) {
						die($e->getMessage());
						}
						?>
                        </td>
                        </tr>
						
						<tr>						
                        <td >
						Contraseña
                        </td>						
                        <td class="text-primary">
                        <a data-toggle="modal" href="#myModal-" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a> 
                        </td>
                        </tr>                        
                      </tbody>
                    </table>

              </div>

 <div class="modal fade" id="myModal-" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Modificar contraseña</h4>
        </div>
        <div class="modal-body">

<form class="form-horizontal" role="form" method="post" action="conf/Upd_contr_perfil.php">
  <div class="form-group">
    <label class="col-lg-2 control-label">Contraseña actual</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control"  maxlength="80" name="contr_act">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label">Nueva contraseña</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control"  maxlength="80" name="nuev_contr" >
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-2 control-label">Repetir contraseña</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" maxlength="80" name="rep_contr" >
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="category_id" value="">
      <button type="submit" class="btn btn-block btn-danger">Actualizar contraseña</button>
    </div>
  </div>
</form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
			
<div class="row">
            <div class="col-md-12">
                  <a  data-toggle="modal" href="#myModal2" class="pull-right btn btn-success">Actualizar mi perfil</a>
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Modificar mi perfil</h4>
        </div>
        <div class="modal-body">

<form class="form-horizontal" role="form" method="post" action="" >
  <div class="form-group">
    <label class="col-lg-2 control-label">Nombre empresa</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" minlength="5" maxlength="80" id="desc" name="desc" value="<?php echo $array['contratos'][0]['con_nomemp'];?>">
    </div>
  </div> 
  
  
  <div class="form-group">
    <label class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" maxlength="20" name="id_cont" value="<?php echo $array['contratos'][0]['con_nom'];?>">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label">Apellido paterno</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" maxlength="20" name="id_cont" value="<?php echo $array['contratos'][0]['con_apep'];?>">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label">Apellido materno</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" maxlength="20" name="id_cont" value="<?php echo $array['contratos'][0]['con_apem'];?>">
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="col-lg-2 control-label">Email</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" maxlength="20" name="id_cont" value="<?php echo $array['contratos'][0]['con_email'];?> ">
    </div>
  </div>
  
    <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-block btn-primary">Actualizar mi perfil</button>
    </div>
  </div>
</form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
            
            </div>
            </div>
