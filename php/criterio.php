<?php
 if(!empty($_POST)){
    if(isset($_POST["nombre"])){
        if($_POST["nombre"]!=""){
			include "conexion.php";
			$sql ="INSERT INTO saesa_ev_criterio (nombre, estado) VALUES (\"$_POST[nombre]\",'1')";
			
			$query = $con->query($sql);
			if($query!=null)
			{
				print "<script>alert(\"Agregado exitosamente.\");window.location='../form-criterio.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../form-criterio.php';</script>";

			}
		}
	}
}
