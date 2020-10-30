<script>
function valida_formulario() {
		var nombre = document.getElementById("txt_emp").value;
		var razn = document.getElementById("txt_razon").value;
		var dire = document.getElementById("txt_dir").value;
		var cur = document.getElementById("txt_curp").value;
	    var rfc = document.getElementById("txt_rfc").value;
		var tele= document.getElementById("txt_tel").value;
		var gir = document.getElementById("txt_giro").value;
		var cont = document.getElementById("txt_cont").value;
		var fax = document.getElementById("txt_fax").value;
		var emp = document.getElementById("txt_em").value;
		var we= document.getElementById("txt_web").value;
		var ciu = document.getElementById("txt_ciudad").value;
		var pais = document.getElementById("txt_pais").value;
		var cod = document.getElementById("txt_cp").value;					
		var lt=new RegExp("^[a-zA-Z]+");		
		if( nombre =="null" || nombre =="" || razn=="null"|| razn =="" || dire=="null"|| dire ==""||cur =="null" || cur =="" ||rfc =="null" || rfc =="" || tele =="null" || tele =="" || gir =="null" || gir =="" || fax =="null" || fax =="" || emp =="null" || emp =="" || we =="null" || we =="" || est =="null" || est =="" || pais =="null" || pais =="" || cod =="null" || cod =="" ) {
		alert("Ingresa los compos reqeridos");
		return false;
		}
		if(!(/\S+@\S+\.\S+/.test(emp))){
			alert('Debe escribir un correo válido');
			return false;
		}
		if(!(/^[9|8|7|6|5|4|3|2]\d{9}$/.test(tele))) {
		  alert('Debe escribir un telefono válido');
		  return false;
		}
		if(!(/^[0-9]{5}$/.test(cod))) {
		  alert('Debe escribir un codigo postal válido');
		  return false;
		}		
		if(!lt.test(nombre) || !lt.test(razn) || !lt.test(gir) || !lt.test(cont) || !lt.test(ciu) || !lt.test(pais)) {
		  alert('Vereficar datos');
		  return false;
		}
		return true;		
}
</script>
<script>
function udp_formulario() {
		var ud_tel = document.getElementById("udp_tel").value;
		var ud_con = document.getElementById("udp_contac").value;
		var ud_emp = document.getElementById("udp_em").value;
		var ud_ciu = document.getElementById("udp_ciudad").value;
		var ud_pas = document.getElementById("udp_pais").value;
		var ud_cod = document.getElementById("udp_cp").value;
		var ud_nom = document.getElementById("udp_emp").value;
		var ud_raz = document.getElementById("udp_raz").value;
		var ud_cur = document.getElementById("udp_cur").value;
		var ud_rfc = document.getElementById("udp_rfc").value;
		var ud_gir = document.getElementById("udp_gir").value;
		var ud_fax = document.getElementById("udp_fax").value;
		var lt=new RegExp("^[a-zA-Z]+");
		if(!(/^[9|8|7|6|5|4|3|2]\d{9}$/.test(ud_tel))){
		  alert('Debe escribir un telefono válido');
		  return false;
		}
		if(!(/\S+@\S+\.\S+/.test(ud_emp))){
			alert('Debe escribir un correo válido');
			return false;
		}
		if(!(/^[0-9]{5}$/.test(cod))) {
		  alert('Debe escribir un codigo postal válido');
		  return false;
		}
		if(!lt.test(ud_nom)|| !lt.test(ud_con) || !lt.test(ud_ciu) || !lt.test(ud_pas) ) {
		  alert('Vereficar datos ');
		  return false;
		}
		return true;
}
</script>
<script >
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
  <input id="filtrar" type="text" class="col-xs-6 col-md-4" placeholder="Buscar empresa...">
</div>


          <div class="row">
            <div class="col-md-12">
                  <a  data-toggle="modal" href="#myModal" class="pull-right btn-sm btn btn-default">Agregar Empresa</a>
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar empresa</h4>
        </div>
        <div class="modal-body">

<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="conf/empresa.php" onsubmit="return valida_formulario()">
  <div class="form-group">
    <label class="col-lg-2 control-label" >id contrato</label>
    <div class="col-xs-10">
      <input type="text"   class="form-control"  maxlength="10" name="txtidcontrato" placeholder="id de contrato">
    </div>
  </div> 
  
  <div class="col">
    <label class="col-lg-2 control-label">Nombre</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" minlength="3" maxlength="80" id="txt_emp" name="txt_emp" placeholder="Nombre empresa">
    </div>
	
    <label class="col-lg-2 control-label">Razon</label>
    <div class="col-xs-4">
      <input type="text"  required class="form-control" minlength="2" maxlength="80" id="txt_razon"  name="txt_razon" placeholder="Razon social">
    </div>
  <br>	<br> 
    <label class="col-lg-2 control-label">Dirección</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" minlength="5" maxlength="80" id="txt_dir" name="txt_dir" placeholder="Dirección">
    </div>
	
    <label  class="col-lg-2 control-label">Curp</label>
    <div class="col-xs-4">
      <input type="text"  required class="form-control" minlength="3" maxlength="20"  id="txt_curp" name="txt_curp"  placeholder="Curp">
    </div>
	<br>	<br> 
    <label  class="col-lg-2 control-label">rfc</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" minlength="1" maxlength="20" id="txt_rfc" name="txt_rfc" placeholder="Rfc">
    </div>
	
    <label class="col-lg-2 control-label">Telefono</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" maxlength="10" id="txt_tel" name="txt_tel" placeholder="Telefono">
    </div>
	<br>	<br> 
    <label class="col-lg-2 control-label">Giro</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" minlength="3" maxlength="80" id="txt_giro" name="txt_giro" placeholder="Giro">
    </div>
	
    <label  class="col-lg-2 control-label">Contacto</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" minlength="5" maxlength="80" id="txt_cont" name="txt_cont" placeholder="Contacto">
    </div>
	<br>	<br> 
    <label class="col-lg-2 control-label">Fax</label>
    <div class="col-xs-4">
      <input type="text"  required class="form-control" minlength="5" maxlength="80" id="txt_fax" name="txt_fax" placeholder="Fax">
    </div>
	
    <label  class="col-lg-2 control-label">Email</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" maxlength="80" id="txt_em" name="txt_em" placeholder="Email">
    </div>
	<br>	<br> 
    <label  class="col-lg-2 control-label">Web</label>
    <div class="col-xs-4">
      <input type="text"  required class="form-control" minlength="5" maxlength="80" id="txt_web" name="txt_web" placeholder="Web">
    </div>
		
	<label  class="col-lg-2 control-label">Ciudad</label>
    <div class="col-xs-4">
      <input type="text"  class="form-control" minlength="3" maxlength="80" id="txt_ciudad" name="txt_ciudad" placeholder="Ciudad">
    </div>
    <br>	<br> 
	<label  class="col-lg-2 control-label">Estado</label>	
	<div class="col-xs-4">
	 <select name="txt_est" class="form-control" >
		<option value="Aguascalientes">Aguascalientes</option>
		<option value="Baja California">Baja California </option>
		<option value="Baja California Sur">Baja California Sur </option>
		<option value="Campeche">Campeche </option>
		<option value="Chiapas">Chiapas </option>
		<option value="Chihuahua">Chihuahua </option>
		<option value="Coahuila">Coahuila </option>
		<option value="Colima">Colima </option>
		<option value="Distrito Federal">Distrito Federal</option>
		<option value="Durango">Durango </option>
		<option value="Estado de México">Estado de México </option>
		<option value="Guanajuato">Guanajuato </option>
		<option value="Guerrero">Guerrero </option>
		<option value="Hidalgo">Hidalgo </option>
		<option value="Jalisco">Jalisco </option>
		<option value="Michoacán">Michoacán </option>
		<option value="Morelos">Morelos </option>
		<option value="Nayarit">Nayarit </option>
		<option value="Nuevo Leon">Nuevo León </option>
		<option value="Oaxaca">Oaxaca </option>
		<option value="Puebla">Puebla </option>
		<option value="Querétaro">Querétaro </option>
		<option value="Quintana Roo">Quintana Roo </option>
		<option value="San Luis Potosí">San Luis Potosí </option>
		<option value="Sinaloa">Sinaloa </option>
		<option value="Sonora">Sonora </option>
		<option value="Tabasco">Tabasco </option>
		<option value="Tamaulipas">Tamaulipas </option>
		<option value="Tlaxcala">Tlaxcala </option>
		<option value="Veracruz">Veracruz </option>
		<option value="Yucatán">Yucatán </option>
		<option value="Zacatecas">Zacatecas</option>
	</select>
	</div>
	
    <label  class="col-lg-2 control-label">Pais</label>
    <div class="col-xs-4">
      <input type="text"  required class="form-control" maxlength="80" id ="txt_pais" name="txt_pais" >
    </div>
  <br>	<br> 
    <label  class="col-lg-2 control-label">Codigo postal</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" maxlength="5" id="txt_cp" name="txt_cp" placeholder="Codigo postal">
    </div>  
  </div>
  
    <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-block btn-primary"> Agregar nueva empresa</button>
    </div>
  </div>
  </div>
</form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
            <h1>Empresas</h1>
            </div>
            </div>

          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-th-list"></i> Empresa
                </div>
                <div class="widget-body medium no-padding">
                  <div class="table-responsive">
					<table class='table table-bordered'>
					<tr><th>Nombre</th> 
					<th>Dirección</th> 
					<th>Telefono</th> 
					<th>Contacto</th> 
					<th>Fax</th>  
					<th>Email</th>  
					<th>Web</th> 
					<th>Cuidad</th> 
					<th>Estado</th> 
					<th>Pais</th> 
					<th>Postal</th>
					</tr>
				
				<tbody class="buscar">
					
	<?php 
		$id="7843577576";		
		//Direccion  del webserver
		$url ='http://192.168.1.75/WSAdmon.asmx?WSDL';
		$client = new SoapClient($url);
		//Parametros que se le envia al webserver para mostrar informacion
		$ab = array(
		'tabla'=>'empresas',
		'idparam'=>'idcontrato',
		'idparam2'=>$id	
		);
		$params = array('tabla'=>json_encode($ab));
		try {
		$response = $client->MostrarInformacion($params);
		$xml = $response->MostrarInformacionResult;
		$data = json_decode($xml);		
		$array = json_decode($data,true);
		//muestra los  valores en la tabla 
		for($x=0;$x<count($array['empresas']); $x++){
		echo"<tr>\n"; 
		echo "<td>".$array['empresas'][$x]['emp_nom']."</td><td>".$array['empresas'][$x]['emp_dir']."</td><td>".$array['empresas'][$x]['emp_tel']."</td><td>".$array['empresas'][$x]['emp_contac']."</td><td>".$array['empresas'][$x]['emp_fax']."</td><td>".$array['empresas'][$x]['emp_email']."</td><td>".$array['empresas'][$x]['emp_web']."</td><td>".$array['empresas'][$x]['emp_ciu']."</td><td>".$array['empresas'][$x]['emp_edo']."</td><td>".$array['empresas'][$x]['emp_pais']."</td><td>".$array['empresas'][$x]['emp_cp']."</td>\n";
		echo"<td style='width:30px;'> <a data-toggle='modal' href='#myModal-' class='btn btn-warning btn-xs'><i class='fa fa-edit'></i></a> ";
		echo "</tr>\n"; 									
						}
						echo "</table>\n";
		} 
		catch(Exception $e) {
		die($e->getMessage());
		}	
?>					

  <!-- Modal -->
  <div class="modal fade" id="myModal-" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Editar Empresa</h4>
        </div>
        <div class="modal-body">

<form class="form-horizontal" role="form" method="post" action="conf/UpdateEmpresa.php"onsubmit="return udp_formulario()">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Id de la empresa</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" maxlength="10" name="id_em" value="" >
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Id del contrato</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" value="" maxlength="80" name="id_con">
    </div>
  </div>
  
    <div class="col">    
    <label  class="col-lg-2 control-label">Empresa</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" value="" minlength="5" maxlength="80" id="udp_emp" name="udp_emp" >
    </div>
  
    <label  class="col-lg-2 control-label">Razon </label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" value="" minlength="5" maxlength="80" id="udp_raz" name="udp_raz" >
    </div>
	<br>	<br>
	
    <label  class="col-lg-2 control-label">Dirección</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control"  value="" minlength="5" maxlength="80" name="udp_dir" >
    </div>
	
    <label  class="col-lg-2 control-label">Curp</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" value="" maxlength="80" id="udp_cur" name="udp_cur" >
    </div>
	<br>	<br>
    <label  class="col-lg-2 control-label">rfc</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" value="" maxlength="80"  id="udp_rfc" name="udp_rfc" >
    </div>
	
    <label  class="col-lg-2 control-label">Telefono</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" value="" maxlength="10" id="udp_tel" name="udp_tel" >
    </div>
	<br>	<br>
    <label  class="col-lg-2 control-label">Giro</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" value="" minlength="5" maxlength="80" id="udp_gir" name="udp_gir" >
    </div>
  
    <label class="col-lg-2 control-label">Contacto</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" value="" minlength="5" maxlength="80" id="udp_contac" name="udp_contac" >
    </div>
	<br>	<br>
    <label class="col-lg-2 control-label">Fax</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" value="" minlength="5" maxlength="80"id="udp_fax" name="udp_fax" >
    </div>
	
    <label class="col-lg-2 control-label">Email</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" value="" maxlength="80" id="udp_em" name="udp_em" >
    </div>
	<br>	<br>
    <label class="col-lg-2 control-label">Web</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" value="" minlength="5" maxlength="80" name="udp_web" >
    </div>
	
    <label class="col-lg-2 control-label">Ciudad</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" value="" minlength="5" maxlength="80" id="udp_ciudad" name="udp_ciudad">
    </div>
	<br>	<br>
    <label class="col-lg-2 control-label">Estado</label>
    <div class="col-xs-4">
	 <select name="udp_est" class="form-control" >
		<option value="Aguascalientes">Aguascalientes</option>
		<option value="Baja California">Baja California </option>
		<option value="Baja California Sur">Baja California Sur </option>
		<option value="Campeche">Campeche </option>
		<option value="Chiapas">Chiapas </option>
		<option value="Chihuahua">Chihuahua </option>
		<option value="Coahuila">Coahuila </option>
		<option value="Colima">Colima </option>
		<option value="Distrito Federal">Distrito Federal</option>
		<option value="Durango">Durango </option>
		<option value="Estado de México">Estado de México </option>
		<option value="Guanajuato">Guanajuato </option>
		<option value="Guerrero">Guerrero </option>
		<option value="Hidalgo">Hidalgo </option>
		<option value="Jalisco">Jalisco </option>
		<option value="Michoacán">Michoacán </option>
		<option value="Morelos">Morelos </option>
		<option value="Nayarit">Nayarit </option>
		<option value="Nuevo Leon">Nuevo León </option>
		<option value="Oaxaca">Oaxaca </option>
		<option value="Puebla">Puebla </option>
		<option value="Querétaro">Querétaro </option>
		<option value="Quintana Roo">Quintana Roo </option>
		<option value="San Luis Potosí">San Luis Potosí </option>
		<option value="Sinaloa">Sinaloa </option>
		<option value="Sonora">Sonora </option>
		<option value="Tabasco">Tabasco </option>
		<option value="Tamaulipas">Tamaulipas </option>
		<option value="Tlaxcala">Tlaxcala </option>
		<option value="Veracruz">Veracruz </option>
		<option value="Yucatán">Yucatán </option>
		<option value="Zacatecas">Zacatecas</option>
	</select>
	</div>
	
    <label class="col-lg-2 control-label">Pais</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control"  minlength="5" maxlength="80" id="udp_pais" name="udp_pais" value="Mexico" disabled>
    </div>
	<br>	<br>
    <label class="col-lg-2 control-label">Codigo postal</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" value="" maxlength="5" id="udp_cp" name="udp_cp" >
    </div>
	
  </div>
  
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="category_id" value="">
      <button type="submit" class="btn btn-block btn-success">Actualizar Empresa</button>
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