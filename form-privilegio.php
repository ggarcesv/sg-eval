<html>
<head>
	<title>Registro de privilegios de usuario</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
</head>
<body>
	<?php // include "navbar.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2>Registro de privilegios de usuario</h2>

				<div class="modal-body">
					<form role="form" method="post" action="php/privilegio.php">

                        <div class="form-group">
							<label for="nombre">Nombre privilegio</label>
							<input type="text" class="form-control" name="nombre" required>
						</div>

						<button type="submit" class="btn btn-default">Guardar</button>
					</form>
				</div>

			</div>
		</div>
	</div>

	<script src="bootstrap/js/bootstrap.min.js"></script>

<h1>Registro de privilegios existentes</h1>
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

$sql1= "select id, nombre from privilegio";
$query = $con->query($sql1);

?>
<table class="table table-bordered table-hover">
	<thead>
		<th>Codigo</th>
		<th>Nombre</th>
	</thead>

	<?php while ($r=$query->fetch_array()):?>
		<tr>
			<td><?php echo $r["id"]; ?></td>
			<td><?php echo $r["nombre"]; ?></td>
		</tr>

	
		
	<?php endwhile;?>

</table>



</body>
</html>