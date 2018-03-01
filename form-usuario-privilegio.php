<html>
<head>
	<title>Registro de sección</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
</head>
<body>
	<?php //include "navbar.php"; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2>Registro de privilegios a usuarios</h2>

				<div class="modal-body">
					<form role="form" method="post" action="php/seccion.php">

                        <label>Sección </label>
                        <select>
                            <option value="0">Seleccione:</option>
                            <?php
                            include "php/conexion.php";
                            $query = $con -> query ("SELECT nombre_seccion FROM saesa_ev_seccion");
                            while ($valores = mysqli_fetch_array($query)) {

                                echo '<option value="'.$valores[id].'">'.$valores[nombre_seccion].'</option>';

                            }
                            ?>
                        </select>
<br>
                        <label>Usuario </label>
                        <select>
                            <option value="0">Seleccione:</option>
                            <?php
                            include "php/conexion.php";
                            $query = $con -> query ("SELECT user_nicename FROM wp_users");
                            while ($valores = mysqli_fetch_array($query)) {

                                echo '<option value="'.$valores[id].'">'.$valores[user_nicename].'</option>';

                            }
                            ?>
                        </select>

<br>
                        <label>Privilegio </label>
                        <select>
                            <option value="0">Seleccione:</option>
                            <?php
                            include "php/conexion.php";
                            $query = $con -> query ("SELECT id, nombre FROM privilegio");
                            while ($valores = mysqli_fetch_array($query)) {

                                echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';

                            }
                            ?>
                        </select>

                        <br>

						<button type="submit" class="btn btn-default">Guardar</button>

					</form>
				</div>

			</div>
		</div>
	</div>

	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>