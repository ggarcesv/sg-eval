<style type="text/css">
.sol{
	width: 60px;
	border-radius: 5px;
}
.perro{
	float: right;
	margin-bottom: 30px;
	margin-left: 20px;
}
.luna{
	width: 300px;
	border-radius: 5px;
}
</style>

<style type="text/css">
.sol{
	width: 60px;
	border-radius: 5px;
}
.perro{
	float: right;
	margin-bottom: 30px;
	margin-left: 20px;
}
.luna{
	width: 300px;
	border-radius: 5px;
}
</style>
<form method="POST" action="form-evaluacion.php">
<label>Seccion </label> 
	
      <select>
        <option value="0">Seleccione:</option>
        <?php
		  include "conexion.php";

          $query = $con -> query ("SELECT nombre_seccion FROM saesa_ev_seccion");							
          while ($valores = mysqli_fetch_array($query)) {
												
            echo '<option value="'.$valores[id].'">'.$valores[nombre_seccion].'</option>';
													
          }
        ?>
      </select>

	<div>

	<label>Criterio </label> 
      <select>
        <option value="0">Seleccione:</option>
        <?php
		  include "conexion.php";								
          $query = $con -> query ("SELECT id, nombre FROM saesa_ev_criterio");							
          while ($valores = mysqli_fetch_array($query)) {
												
            echo '<option name="crt" value="'.$valores[id].'">'.$valores[nombre].'</option>';										
          }

        ?>
      </select>
      <button class="btn btn-success">filtrar</button>
</form>
<br>

<h1>Registro de notas</h1>
<br>


<?php
include "conexion.php";
if(!empty($_POST)){
$sql1= "select evaluacion.id, evaluacion.fecha, evaluacion.wp_users_ID, wp_users.display_name, evaluacion.saesa_ev_criterio_id, saesa_ev_criterio.nombre, evaluacion.nota from evaluacion, saesa_ev_criterio, wp_users where evaluacion.wp_users_ID=wp_users.ID and evaluacion.saesa_ev_criterio_id=saesa_ev_criterio.id saesa_ev_criterio.id=\"$_POST[crt]\"";
$query = $con->query($sql1);
}else{
$sql1= "select evaluacion.id, evaluacion.fecha, evaluacion.wp_users_ID, wp_users.display_name, evaluacion.saesa_ev_criterio_id, saesa_ev_criterio.nombre, evaluacion.nota from evaluacion, saesa_ev_criterio, wp_users where evaluacion.wp_users_ID=wp_users.ID and evaluacion.saesa_ev_criterio_id=saesa_ev_criterio.id";
$query = $con->query($sql1);
}

?>
<form role="form" method="post" action="php/update.php"> 
<table class="table table-bordered table-hover">
	<thead>
		<th>Ev_id</th>
		<th>Fecha</th>
		<th>User_id</th>
		<th>Nombre</th>
		<th>Criterio_id</th>
		<th>Criterio_nombre</th>
		<th>Nota</th>
	</thead>

	<?php while ($r=$query->fetch_array()):?>
		<tr>
			<td><?php echo $r["id"];?></td>
			<td><?php echo $r["fecha"]; ?></td>
			<td><?php echo $r["wp_users_ID"]; 
			echo '<input type="text" name="id[]" class="sr-only" value="'.$r["wp_users_ID"].'" />';
			?></td>
			<td><?php echo $r["display_name"]; ?></td>
			<td><?php echo $r["saesa_ev_criterio_id"]; 
			echo '<input type="text" name="criterio[]" class="sr-only" value="'.$r["saesa_ev_criterio_id"].'" />';
			?></td>
			<td><?php echo $r["nombre"]; ?></td>
			<td><?php 
				echo '<input type="text" class="sol form-control" name="nota[]" value="'.$r["nota"].'" />';
			?></td>
		</tr>
	<?php endwhile;?>


</table>


<div>	
		<button class="btn btn-sm btn-success perro">Guardar</button>


	</form>
</div>