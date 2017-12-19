<?php

 if(!empty($_POST)){
    if(isset($_POST["nombre"])){
        if($_POST["nombre"]!=""){
			include "conexion.php";
			$sql ="INSERT INTO privilegio (nombre) VALUES (\"$_POST[nombre]\")";
			
			$query = $con->query($sql);
			if($query!=null)
			{
				print "<script>alert(\"Agregado exitosamente.\");window.location='../form-privilegio.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../form-privilegio.php';</script>";

				}
		}
	}
}