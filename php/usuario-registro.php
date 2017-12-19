<?php
 if(!empty($_POST)){
	if(isset($_POST["user_login"]) &&isset($_POST["user_pass"]) &&isset($_POST["user_email"]) &&isset($_POST["user_rut"])){
		if($_POST["user_login"]!=""&& $_POST["user_pass"]!=""&&$_POST["user_email"]!=""&&$_POST["user_rut"]!=""){
			include "conexion.php";
			$sql ="INSERT INTO wp_users (user_login, user_pass, user_nicename, user_email, user_url, user_registered, user_activation_key, user_status, display_name, user_rut) VALUES (\"$_POST[user_login]\", \"$_POST[user_pass]\", \"$_POST[user_login]\", \"$_POST[user_email]\", '', '2017-11-11 01:06:08', '', '0', \"$_POST[user_login]\", \"$_POST[user_rut]\")";
			
			$query = $con->query($sql);
			if($query!=null)
			{
				print "<script>alert(\"Agregado exitosamente.\");window.location='../form-usuario-registro.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../form-usuario-registro.php';</script>";

				}
		}
	}
}