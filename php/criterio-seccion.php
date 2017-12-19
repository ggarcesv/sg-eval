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
<form method="POST" action="criterio-seccion.php">


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
      <button class="btn btn-success">Guardar</button>
</form>
<br>

<?php
include "conexion.php";
if(!empty($_POST)){


$sql1= "SELECT saesa_ev_criterio_id, saesa_ev_seccion_id, ponderacion FROM saesa_ev_criterio_has_saesa_ev_seccion=\"$_POST[crt]\"";
$query = $con->query($sql1);
}else{
$sql1= "SELECT saesa_ev_criterio_id, saesa_ev_seccion_id, ponderacion FROM saesa_ev_criterio_has_saesa_ev_seccion";
$query = $con->query($sql1);
}

?>
<form role="form" method="post" action="php/update.php"> 
<table class="table table-bordered table-hover">
	<thead>
		<th>saesa_ev_criterio_id</th>
		<th>saesa_ev_seccion_id</th>
		<th>ponderacion</th>
	</thead>

	<?php while ($r=$query->fetch_array()):?>
		<tr>
			<td><?php echo $r["saesa_ev_criterio_id"];?></td>
			<td><?php echo $r["saesa_ev_seccion_id"]; ?></td>
			<td><?php 
				echo '<input type="text" class="sol form-control" name="ponderacion[]" value="'.$r["ponderacion"].'" />';
			?></td>
		</tr>
	<?php endwhile;?>


</table>


<div>	
		<button class="btn btn-sm btn-success perro">Guardar</button>


	</form>
</div>