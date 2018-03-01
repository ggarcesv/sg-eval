<?php

 if(!empty($_POST)){
    if(isset($_POST["id"])&&isset($_POST["nombre_seccion"])){
        if($_POST["id"]!=""&& $_POST["nombre_seccion"]!=""){
			include "conexion.php";
			$sql ="INSERT INTO saesa_ev_seccion (id, nombre_seccion) VALUES (\"$_POST[id]\",\"$_POST[nombre_seccion]\")";
			
			$query = $con->query($sql);
			if($query!=null)
			{
				print "<script>alert(\"Agregado exitosamente.\");window.location='../form-seccion.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../form-seccion.php';</script>";

				}
		}
	}
}