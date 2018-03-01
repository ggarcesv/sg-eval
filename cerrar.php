<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		session_start();
		session_destroy();

		header("Location:..//wp-login.php")
	 ?>

</body>
</html>