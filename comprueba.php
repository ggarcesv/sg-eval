<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
  try{
    $base=new pdo("mysql:host=localhost; dbname=wordpress","root","");
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="SELECT * FROM USUARIOS_PASS WHERE usuario= :login and password= :password";
    $resultado=$base->query($sql);

    $login=htmlentities(addslashes($_POST["login"]));

    $password=htmlentities(addslashes($_POST["password"]));

    $resultado->bindValue(":login",$login);

    $resultado->bindValue(":password",$password);

    $resultado->execute();

    $numero_registro=$resultado->rowCount();

    if($numero_registro!=0){
      session_start();
      $_SESSION["usuario"]=$_POST["login"];

      header("Location:ver.php");
    
    }else{
      header("Location:login.php");
    }

  }catch(Exception $e){
      die("Errot: ". $e->getMessage());
  }
   ?>
</body>
</html>