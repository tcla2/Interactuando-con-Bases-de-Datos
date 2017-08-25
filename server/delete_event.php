<?php

  require('conector.php');
  session_start();

  $con = new ConectorBD('localhost','root','12629752');
  
  $cod = $_POST['id'];

  $response['conexion'] = $con->initConexion('agenda');

  
  if ($response['conexion']=='OK') {
    if($con->eliminarRegistro('evento','Id="'.$cod.'"')){
		  $response['msg']="OK";
    }else {
      $response['msg']= "Hubo un error y los datos no han sido cargados";
    }
  }else {
    $response['msg']= "No se pudo conectar a la base de datos";
  }

  echo json_encode($response);


?>