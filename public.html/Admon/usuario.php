<script>
function valida_formulario() {
		var  nom = document.getElementById("usu_nom").value;
		var  usu = document.getElementById("usu_usu").value;
		var  pws = document.getElementById("usu_pws").value;
		var  rep = document.getElementById("usu_rep").value;
	    var  pto = document.getElementById("usu_pto").value;
		var  dep = document.getElementById("usu_dep").value;
		var  eml = document.getElementById("usu_email").value;
		var  tel = document.getElementById("usu_tel").value;	
		var lt=new RegExp("^[a-zA-Z]+");
		var espacios = false;
		var cont = 0;
		while (!espacios && (cont < pws.length)) {
		if (pws.charAt(cont) == " ")
		espacios = true;
		cont++;
		}
		if (espacios) {
		alert ("La contraseña no puede contener espacios en blanco");
		return false;
		}
		if(!(/\S+@\S+\.\S+/.test(eml))){
			alert('Debe escribir un correo válido');
			return false;
		}
		if(!(/^[9|8|7|6|5|4|3|2]\d{9}$/.test(tel))) {
		  alert('Debe escribir un telefono válido');
		  return false;
		}		
		if(pws != rep){
		  alert('Las contraseñas deben de coincidir');
		  return false;	
		}
		return true;		
}
</script>
<script>
function udp_formulario() {
		var ud_nam = document.getElementById("udp_name").value;
		var ud_usu = document.getElementById("udp_usuario").value;
		var ud_con = document.getElementById("udp_contrasena").value;
		var ud_dep = document.getElementById("udp_depa").value;
		var ud_ema = document.getElementById("udp_email").value;
		var ud_tel = document.getElementById("udp_tel").value;
		var ud_pue = document.getElementById("*udp_pue").value;
		var lt=new RegExp("^[a-zA-Z]+");
		if(!(/^[9|8|7|6|5|4|3|2]\d{9}$/.test(ud_tel))) {
		  alert('Debe escribir un telefono válido');
		  return false;
		}
		if(!(/\S+@\S+\.\S+/.test(ud_ema))){
			alert('Debe escribir un correo válido');
			return false;
		}
		if(!lt.test(ud_nam) || !lt.test(ud_dep)|| !lt.test(ud_pue)) {
		  alert('Verefique sus datos');
		  return false;
		}
		return true;
}
</script>

 <script>
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
  <input id="filtrar" type="text" class="col-xs-6 col-md-4" placeholder="Buscar usuario...">
</div>

   <div class="row">
            <div class="col-md-12">
                  <a  data-toggle="modal" href="#myModal" class="pull-right btn-sm btn btn-default">Agregar Usuario</a>
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar Usuario</h4>
        </div>
        <div class="modal-body">

<form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="conf/usuario.php" onsubmit="return valida_formulario()">
  <div class="form-group">
    <label class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" minlength="5" maxlength="80" id="usu_nom" name="usu_nom" placeholder="Nombre del usuario">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label">Usuario</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" minlength="5" maxlength="80" id="usu_usu" name="usu_usu" placeholder="Usuario">
    </div>
	</div>
	
   <div class="form-group">	
	<label class="col-lg-2 control-label">Imagen</label><p></p>
	<p style="text-align:center;">	<img id="image" width="100" height="100" /></p>
	 <div class="col-lg-10">
	<input type="file" name="archivo" id="upload" required="required"/> 
	</div>
   </div>
 <script>
 //cargar imagen
document.getElementById("upload").onchange = function() {
  var reader = new FileReader(); 
  reader.onload = function(e) {
    document.getElementById("image").src = e.target.result;
  }; 
  reader.readAsDataURL(this.files[0]);
}; 
</script>
		
		
		</br>
  <div class="form-group">
    <label class="col-lg-2 control-label">Contraseña</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" minlength="3" maxlength="20" id="usu_pws" name="usu_pws" placeholder="Contraseña ">
    </div>
  </div>	
  
  <div class="form-group">
    <label class="col-lg-2 control-label">Repetir Contraseña</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" minlength="3" maxlength="20" id="usu_rep" name="usu_rep" placeholder="Repetir contraseña">
    </div>
  </div>	
  
  <div class="form-group">
    <label class="col-lg-2 control-label">Puesto</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" minlength="5" maxlength="80" id="usu_pto" name="usu_pto" placeholder="Puesto">
    </div>
  </div>
  
	<div class="form-group">
    <label class="col-lg-2 control-label">Departemento</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" minlength="5" maxlength="80" id="usu_dep" name="usu_dep" placeholder="Departemento">
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-2 control-label">Email</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control"  maxlength="80" id="usu_email" name="usu_email" placeholder="Email">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label">Telefono</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" maxlength="10" id="usu_tel" name="usu_tel" placeholder="Telefono">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label">Id de contrato</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" maxlength="80" name="id" placeholder="id">
    </div>
  </div>
  
  
    <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-block btn-primary"> Agregar nuevo usuario</button>
    </div>
  </div>
</form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
            <h1>Usuarios</h1>
            </div>
            </div>
			

	<div class="row">
	<div class="col-md-12">		
	<div class="panel panel-default">
	<div class="panel-heading">
       <i class="fa fa-user fa-fw"></i> Usuario
    </div>
    <div class="widget-body medium no-padding">
	<div class="table-responsive">
	
	<table class='table table-bordered'>
	<tr>
	<th>Nombre</th>
	<th>Usuario</th>
	<th>Contraseña</th>
	<th>Puesto</th>
	<th>Departemento</th>
	<th>Email</th>
	<th>Telefono</th>
	</tr>
	<tbody class="buscar">
	<?php
		$id="7843577576";
		//Direccion  del webserver
		$url ='http://192.168.1.75/WSAdmon.asmx?WSDL';
		$client = new SoapClient($url);
		//Parametros que se le envia al webserver para mostrar informacion
		$ab = array(
		'tabla'=>'usuarios',
		'idparam'=>'idcontrato',
		'idparam2'=>$id
		);
		
		$params = array('tabla'=>json_encode($ab));
		try {
		$response = $client->MostrarInformacion($params);
		$xml = $response->MostrarInformacionResult;
		$data = json_decode($xml);
		$array = json_decode($data,true);
		//mostrar los datos en la tabla	
		for($x=0;$x<count($array['usuarios']); $x++){							
		echo"<tr>";							
		echo "<td>".$array['usuarios'][$x]['usu_nom']."</td><td>".$array['usuarios'][$x]['usu_usu']."</td><td>".$array['usuarios'][$x]['usu_pws']."</td><td>".$array['usuarios'][$x]['usu_pto']."</td><td>".$array['usuarios'][$x]['usu_depto']."</td><td>".$array['usuarios'][$x]['usu_email']."</td><td>".$array['usuarios'][$x]['usu_tel']."</td>\n";									
		echo"<td style='width:30px;'> <a data-toggle='modal' href='#myModal-' class='btn btn-warning btn-xs'><i class='fa fa-edit'></i></a> ";							
		echo "</tr>";					
			}
		echo "</table>\n";
		} 
		catch(Exception $e) {
		die($e->getMessage());
		}
?>						  
						
<div class="modal fade" id="myModal-" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Editar usuario</h4>
        </div>
        <div class="modal-body">

<form class="form-horizontal" role="form" method="post" action="conf/UpdateUsuario.php" onsubmit="return udp_formulario()">
<div class="form-group">
    <label class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" minlength="5" maxlength="80" id="udp_name" name="udp_name" value="">
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-2 control-label">Usuario</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" minlength="5" maxlength="80" value="" id="udp_usuario" name="udp_usuario" >
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label">Contraseña</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" minlength="3" maxlength="20" value="" id="udp_contrasena" name="udp_contrasena" >
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label">Puesto</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" minlength="5" maxlength="80" value="" id="udp_pue" name="udp_pue">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label">Departemento</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" minlength="5" maxlength="80" value="" id="udp_depa" name="udp_depa">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label">Email</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" maxlength="80" value="" id="udp_email" name="udp_email" >
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-lg-2 control-label">Telefono</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" maxlength="10" value="" id="udp_tel" name="udp_tel">
    </div>
  </div>
 
 <div class="form-group">
    <label class="col-lg-2 control-label">ID usuario</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" value="" name="id_usuario" >
    </div>
  </div>

 
  <div class="form-group">
    <label class="col-lg-2 control-label">ID contrato</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" value="" name="udp_cont">
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="category_id" value="">
      <button type="submit" class="btn btn-block btn-success">Actualizar usuario</button>
    </div>
  </div>
</form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

                   
		</tbody>	
         </table>
          </div>
		</div>	
      </div>
    </div>
</div>