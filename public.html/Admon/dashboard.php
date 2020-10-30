            <div id="page-inner">			
			<div class = "panel panel-default">
		    <div class = "panel-body">
		      <h1 class="text-center text-danger"># Sucursales</h1>
		    </div>
			</div>
			<div class="bg-warning text-white"> 
			<h1 class="text-center text-danger"><a data-toggle="modal" href="#myModal"  class="text-center card-title">Agregar nueva sucursal</a><h1>				
			</div>	
			<section class="panel panel-info">
			<header class="panel-heading">
			<h5 class="panel-title">Descargar actualizador</h5>
			</header>
			<div class="card-body">				
				<a href="#" class="btn btn-block btn-success">Descargar</a>
				</div>  
			</section>	
			<div class = "panel panel-default">
		    <div class = "panel-body">
		      <h1 class="text-center text-success"># Regitros actualizados</h1>
		    </div>
			</div>
			<div class = "panel panel-danger">
		   <div class = "panel-heading">
			  <h3 class = "panel-title">Soporte</h3>
		   </div>
		   <div class = "panel-body">
			 <p> Soporte</p>
			 <p>Guias</p>
			 <p> Contactanos</p>			  
		   </div>
		   </div>			
</div>
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

				
				