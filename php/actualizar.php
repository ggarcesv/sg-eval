<?php
if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["apellido"]) &&isset($_POST["seccion"]) &&isset($_POST["nota"])){
		if($_POST["nombre"]!=""&& $_POST["apellido"]!=""&&$_POST["seccion"]!=""){
			include "conexion.php";
			
			$sql = "update alumnos set nombre=\"$_POST[nombre]\",apellido=\"$_POST[apellido]\",seccion=\"$_POST[seccion]\",nota=\"$_POST[nota]\" where id=".$_POST["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../ver.php';</script>";

			}
		}
	}
}