<script>
function valida_formulario() {
		var  nom = document.getElementById("nom_emp").value;
		var  raz = document.getElementById("raz_emp").value;
		var  dire= document.getElementById("dir_emp").value;
		var  tel = document.getElementById("tel_emp").value;
	    var  fa  = document.getElementById("fax_emp").value;
		var  ema = document.getElementById("email_emp").value;
		var  ciud= document.getElementById("ciu_emp").value;
		var  cod = document.getElementById("cp_emp").value;
		var  con = document.getElementById("cont_emp").value;
		var lt=new RegExp("^[a-zA-Z]+");
		if(!(/\S+@\S+\.\S+/.test(ema))){
			alert('Debe escribir un correo válido');
			return false;
		}
		if(!(/^[9|8|7|6|5|4|3|2]\d{9}$/.test(tel))) {
		  alert('Debe escribir un telefono válido');
		  return false;
		}
		if(!(/^[0-9]{5}$/.test(cod))) {
		  alert('Debe escribir un codigo postal válido');
		  return false;
		}
		if(!lt.test(nom) || !lt.test(raz) || !lt.test(ciud) || !lt.test(con)) {
		  alert('Vereficar datos donde llevan solo letras');
		  return false;
		}		
		return true;		
}
</script>

<script>
function udp_formulario() {
		var ud_nom = document.getElementById("udp_nom").value;
		var ud_raz = document.getElementById("udp_raz").value;
		var ud_dir = document.getElementById("udp_dir").value;
		var ud_tel = document.getElementById("udp_tel").value;
		var ud_fax = document.getElementById("udp_fax").value;
		var ud_eml = document.getElementById("udp_eml").value;
		var ud_ciu = document.getElementById("udp_ciu").value;
		var ud_cod = document.getElementById("udp_cod").value;
		var ud_cot = document.getElementById("udp_cot").value;		
		var lt=new RegExp("^[a-zA-Z]+");
		if(!(/\S+@\S+\.\S+/.test(ud_eml))){
			alert('Debe escribir un correo válido');
			return false;
		}
		if(!(/^[9|8|7|6|5|4|3|2]\d{9}$/.test(ud_tel))) {
		  alert('Debe escribir un telefono válido');
		  return false;
		}
		if(!(/^[0-9]{5}$/.test(ud_cod))) {
		  alert('Debe escribir un codigo postal válido');
		  return false;
		}
		if(!lt.test(ud_nom)||!lt.test(ud_ciu)  ||!lt.test(ud_cot)) {
		  alert('Vereficar datos donde llevan solo letras');
		  return false;
		}
		return true;
}
</script>

<!-- Main Content -->
</br>
</br>
<div class="row">
    <div class="col-xs-6 col-md-4">
      <div class="input-group">
   <input type="text" class="form-control" placeholder="Buscar sucursal" id="txtSearch"/>
   <div class="input-group-btn">
        <button class="btn btn-primary" type="submit">
        <span class="glyphicon glyphicon-search"></span>
        </button>
   </div>
   </div>
    </div>
  </div>
          <div class="row">
            <div class="col-md-12">
                  <a  data-toggle="modal" href="#myModal" class="pull-right btn-sm btn btn-default">Agregar Sucursal</a>
  <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar Sucursal</h4>
        </div>
        <div class="modal-body">

<form class="form-horizontal" role="form" method="post" action="conf/sucursal.php" onsubmit="return valida_formulario()"> 
    
  <div class="form-group">
    <label  class="col-lg-2 control-label">Id de empresa</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" maxlength="20" name="idempresa"  placeholder="id ">
    </div>
  </div>
  
  <div class="form-group">
    <label  class="col-lg-2 control-label">Id de contrato</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" maxlength="20" name="idcontrato"  placeholder="id ">
    </div>
  </div>
  
  <div class="col">
    <label class="col-lg-2 control-label">Nombre</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" minlength="5" maxlength="80" id="nom_emp" name="nom" placeholder="Nombre sucursal">
    </div>
  
    <label class="col-lg-2 control-label">Razon</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" minlength="3" maxlength="80" id="raz_emp" name="razs" placeholder="Razon Social">
    </div>
	</br>	</br>
    <label class="col-lg-2 control-label">Dirección</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" minlength="5" maxlength="80" id="dir_emp" name="dir" placeholder="Dirección">
    </div>
	
    <label class="col-lg-2 control-label">Telefono</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" maxlength="10" id="tel_emp" name="tel" placeholder="Telefono">
    </div>
	</br>	</br>
    <label class="col-lg-2 control-label">Fax</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" minlength="5" maxlength="20" id="fax_emp" name="fax" placeholder="Fax">
    </div>
  
    <label class="col-lg-2 control-label">Email</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" maxlength="80" id="email_emp" name="email" placeholder="Email">
    </div>
  </br>	</br>
    <label class="col-lg-2 control-label">Ciudad</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" minlength="5" maxlength="40" id="ciu_emp" name="ciu" placeholder="Ciudad">
    </div>
  
    <label class="col-lg-2 control-label">Estado</label>
    <div class="col-xs-4">
	 <select name="edo" class="form-control" >
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
	</br>	</br>
    <label class="col-lg-2 control-label">Codigo postal</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" maxlength="5" id="cp_emp" name="cp" placeholder="Codigo postal">
    </div>
	
    <label class="col-lg-2 control-label">Contacto</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" minlength="5" maxlength="80" id="cont_emp" name="contac" placeholder="Contacto">
    </div>  
  </div> 
  
    <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-block btn-primary"> Agregar nueva sucursal</button>
    </div>
  </div>
</form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
  
            <h1>Sucursales</h1>
            </div>
            </div>

          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-th-list"></i> Sucursal
                </div>
                <div class="widget-body medium no-padding">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                    <thead>
                    <th></th>
                      <th>Nombre</th>
                      <th>Actualización</th>
					  <th>Estatus</th>
					  <th>Dirección IP</th>					 
                      <th></th>
                    </thead>
                      <tbody>
					  
                        <tr>
                        <td style="width:30px;"> 
						
                        <td style="width:70px;"></td>
                        <td style="width:70px;"></td>
                        <td style="width:70px;"></td>
                        <td style="width:70px;"></td>
						
                        </td>
						
                        <td style="width:90px;">
                        <a data-toggle="modal" href="#myModal-" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a> 
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="myModal-" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Editar Sucursal</h4>
        </div>
        <div class="modal-body">

<form class="form-horizontal" role="form" method="post" action="conf/UpdateSucursal.php" onsubmit="return udp_formulario()">

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">ID sucursal</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" value="" name="id_sucursal" >
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">ID empresa</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" value="" name="id_emp" >
    </div>
  </div>
  
  
  <div class="col">
    <label  class="col-lg-2 control-label">Nombre</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" minlength="5"  value="" maxlength="80" id="udp_nom" name="udp_nom">
    </div>
	
    <label class="col-lg-2 control-label">Razon</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" minlength="5"  value="" maxlength="80" id="udp_raz" name="udp_raz">
    </div>
  </br>	</br>
    <label class="col-lg-2 control-label">Dirección</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" minlength="5"  value="" maxlength="80" id="udp_dir" name="udp_dir">
    </div>
  
    <label  class="col-lg-2 control-label">Telefono</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" minlength="5"  value="" maxlength="10" id="udp_tel" name="udp_tel">
    </div>
	</br>	</br>
    <label class="col-lg-2 control-label">Fax</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" minlength="5"  value="" maxlength="80" id="udp_fax" name="udp_fax">
    </div>
	
    <label  class="col-lg-2 control-label">Email</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" minlength="5"  value="" maxlength="80" id="udp_eml" name="udp_eml">
    </div>
	</br>	</br>
    <label class="col-lg-2 control-label">Ciudad</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" minlength="5"  value="" maxlength="80" id="udp_ciu" name="udp_ciu">
    </div>
  
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
	
  </br>	</br>
    <label class="col-lg-2 control-label">Codigo postal</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" minlength="5"  value="" maxlength="5" id="udp_cod" name="udp_cod">
    </div>
  
    <label class="col-lg-2 control-label">Contacto</label>
    <div class="col-xs-4">
      <input type="text" required class="form-control" minlength="5"  value="" maxlength="80" id="udp_cot" name="udp_cot">
    </div>  
  </div>
  
  
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="category_id" value="">
      <button type="submit" class="btn btn-block btn-success">Actualizar Sucursal</button>
    </div>
  </div>
</form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

                       <a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a> 
                        </td>
                        </tr>

                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
            </div>

          </div>
		    