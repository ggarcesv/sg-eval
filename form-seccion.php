<html>
<head>
	<title>Registro de sección</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
</head>
<body>
	<?php // include "navbar.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2>Registro de nueva sección</h2>

				<div class="modal-body">
					<form role="form" method="post" action="php/seccion.php">

                        <div class="form-group">
							<label for="id">Codigo Sección</label>
							<input type="text" class="form-control" name="id" required>
						</div>


                        <div class="form-group">
							<label for="nombre_seccion">Nombre sección</label>
							<input type="text" class="form-control" name="nombre_seccion" required>
						</div>

						<button type="submit" class="btn btn-default">Guardar</button>
					</form>
				</div>

			</div>
		</div>
	</div>

	<script src="bootstrap/js/bootstrap.min.js"></script>


	<h1>Registro de sección existentes</h1>
<br>


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


<?php
include "php/conexion.php";

$sql1= "select id, nombre_seccion from saesa_ev_seccion";
$query = $con->query($sql1);

?>
<table class="table table-bordered table-hover">
	<thead>
		<th>id</th>
		<th>Nombre</th>
	</thead>

	<?php while ($r=$query->fetch_array()):?>
		<tr>
			<td><?php echo $r["id"]; ?></td>
			<td><?php echo $r["nombre_seccion"]; ?></td>
		</tr>

	
		
	<?php endwhile;?>

</table>


</body>
</html>