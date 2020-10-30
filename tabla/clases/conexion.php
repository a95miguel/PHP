

<?php 

	class conectar{
		public function conexion(){
			$conexion=mysqli_connect('localhost','root','133z0200','juegos');
			return $conexion;
		}
	}


 ?>