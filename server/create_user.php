<?php

  include('conector.php');

  $email = $_POST['email'];
  $pass =$_POST['contrasena'];
   

  $con = new ConectorBD('localhost','root','12629752');
  $response['conexion'] = $con->initConexion('agenda');
  
  $condicion= "WHERE usuario =".$email." AND password=".$pass;

  if ($response['conexion']=='OK') {
	 $res=$con->consultar(['usuarios'], ['usuario','password'], $condicion);
    if($res){
      
    }else {
   
    }
  }else {
   
  }
  
  


  echo json_encode($res);


 ?>
