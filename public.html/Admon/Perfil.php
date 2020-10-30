<script>
function valida_formulario() {
		var  descu = document.getElementById("desc").value;	
		var lt=new RegExp("^[a-zA-Z\s]");
		if(!lt.test(descu) ) {
		  alert('Verefica su dato');
		  return false;
		}		
		return true;		
}
</script>
<script>
function udp_formulario() {
		var ud_per = document.getElementById("des_perfil").value;
		var lt=new RegExp("^[a-zA-Z]+");
		if(!lt.test(ud_per)) {
		  alert('Verefique su dato');
		  return false;
		}
		return true;
}
</script>
<script>
//buscar
        $(document).ready(function () {
            (function ($) {
                $('#filtrar').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });
 </script>    
    
</br>
</br>
<div class="input-group">
  <span class="input-group-addon">Buscar</span>
  <input id="filtrar" type="text" class="col-xs-6 col-md-4" placeholder="Buscar perfil...">
</div>


          <div class="row">
            <div class="col-md-12">
                  <a  data-toggle="modal" href="#myModal" class="pull-right btn-sm btn btn-default">Agregar Perfil</a>
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar Perfil</h4>
        </div>
        <div class="modal-body">

<form class="form-horizontal" role="form" method="post" action="conf/Perfil.php" onsubmit="return valida_formulario()">
  <div class="form-group">
    <label class="col-lg-2 control-label">Descripcion</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" minlength="5" maxlength="80" id="desc" name="desc" placeholder="Descripcion del perfil" >
    </div>
  </div> 
  
  <div class="form-group">
    <label class="col-lg-2 control-label">Id de contrato</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" maxlength="20" name="id_cont"  placeholder="id">
    </div>
  </div>
  
  
    <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-block btn-primary"> Agregar nuevo perfil</button>
    </div>
  </div>
</form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
            <h1>Perfiles</h1>
            </div>
            </div>

 <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-th-list"></i> Perfil
                </div>
                <div class="widget-body medium no-padding">
                  <div class="table-responsive">
				  <table class='table table-bordered'>
				  <tr>
				  <th class="boton">Id perfil</th>
				  <th id='b'>Descripcion</th> 
				  <th id='c'>Id contrato</th>
				  </tr>
				  <tbody class="buscar">
<?php 	
		$id="7843577576";
		//Direccion  del webserver
		$url ='http://192.168.1.75/WSAdmon.asmx?WSDL';
		$client = new SoapClient($url);
		//Parametros que se le envia al webserver para mostrar informacion
		$ab = array(
		'tabla'=>'perfiles',
		'idparam'=>'idcontrato',
		'idparam2'=>$id		
		);		
		$params = array('tabla'=>json_encode($ab));
		try {
		$response = $client->MostrarInformacion($params);
		$xml = $response->MostrarInformacionResult;
		$data = json_decode($xml);
		$array = json_decode($data,true);
		//Moostrar datos en la tabla
		for($x=0;$x<count($array['perfiles']); $x++){
		echo"<tr>\n"; 
		echo "<td class=boton'>".$array['perfiles'][$x]['idperfil']."</td><td id='b'>".$array['perfiles'][$x]['per_descr']."</td><td id='c'>".$array['perfiles'][$x]['idcontrato']."</td>\n";									
		echo"<td style='width:30px;'> <a data-toggle='modal' href='#myModal-' class='btn btn-warning btn-xs'><i class='fa fa-edit' class='boton'></i></a> ";
		echo "</tr>\n"; 									
				}
					echo "</table>\n";
		} 
		catch(Exception $e) {
		die($e->getMessage());
		}	
?>	
                    </thead>
                      
<script>

    $(document).ready(function() {


      $(".boton").click(function() {

        //valores obtendra el dato del td por posciones [0]
        var valores = $(this).parents("tr").find("td")[0].innerHTML;
        console.log(valores);
        alert(valores);

        });

    });
  </script>
  <!-- Modal -->
  <div class="modal fade" id="myModal-" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Editar Perfil</h4>
        </div>
        <div class="modal-body">

<form class="form-horizontal" role="form" method="post" action="conf/UpdatePerfil.php" onsubmit="return udp_formulario()">
  <div class="form-group">
    <label class="col-lg-2 control-label">Descripcion</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" minlength="5" maxlength="80" id="des_perfil" name="des_perfil" value="<?php 	
	  ?>">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label">ID Perfil</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" value="'+id perfil+'" name="id_perfil" >
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-2 control-label">ID contrato</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" value="" name="id_contrato" >
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="category_id" value="">
      <button type="submit" class="btn btn-block btn-success">Actualizar Perfil</button>
    </div>
  </div>
</form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->                       
                        </td>
                        </tr>

                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
            </div>

          			
			