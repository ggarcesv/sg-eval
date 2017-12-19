<?php
include "conexion.php";

//variables recibidas por POST

$id=isset($_POST['id']) ? $_POST['id'] : '';
$criterio=isset($_POST['criterio']) ? $_POST['criterio'] : '';
$nota=isset($_POST['nota']) ? $_POST['nota'] : '';


for($i=0;$i<sizeof($nota);++$i)
{
	//echo "<br>"."update evaluacion set nota=$nota[$i] where wp_users_ID=$id[$i] and saesa_ev_criterio_id=$criterio[$i]";
	$sql = "update evaluacion set nota=$nota[$i] where wp_users_ID=$id[$i] and saesa_ev_criterio_id=$criterio[$i]";
	$query = $con->query($sql);
}

print "<script>alert(\"Actualizado Exitosamente.\");window.location='../form-evaluacion.php';</script>";
