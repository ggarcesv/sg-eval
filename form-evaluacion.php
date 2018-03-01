<html>
<head>
  <title>Modulo de Evaluacion</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <style type="text/css">
    .sol{
    width: 60px;
  }
  .luna{
    width: 300px;
  }
  </style>
</head>
<body>
  <?php 
 // session_start();
 // if (!isset($_SESSION["usuario"])) {
      //header("Location:login.php");
  //}else{
    //header("Location:ver.php");
  //}
  //?>
  
	<?php //include "navbar.php"; ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Modulo de evaluacion</h2>
        <!-- Button trigger modal -->
        <div>
        <br>
        <br>
        <br>
        <?php include "php/evaluacion.php"; ?>
      </div>
    </div>
  </div>
  </div>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>